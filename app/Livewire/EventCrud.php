<?php

namespace App\Livewire;

use App\Models\Tags;
use App\Models\Videos;
use Livewire\Component;
use Livewire\WithPagination;

class EventCrud extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title, $tag_id, $video_id, $videoId;
    public $tags;
    public $isEditing = false;

    public $search = ''; // Added search property

    public function updatedSearch()
    {
        // This is now handled automatically by Livewire 3
        // If needed, you can add debounce:
        // $this->search = $value; // Assign the new value
    }

    public function mount()
    {
        $this->tags = Tags::all();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'tag_id' => 'required|exists:tags,id',
            'video_id' => 'required',
        ]);
        $tag = Tags::find($this->tag_id);
        // Create new video
        Videos::create([
            'title' => $this->title,
            'tag' => $tag->slug,
            'tag_id' => $this->tag_id,
            'video_id' => $this->video_id,
        ]);

        session()->flash('message', 'Video added successfully.');

        $this->resetForm();
    }


    public function edit($id)
    {
        $video = Videos::findOrFail($id);
        $this->videoId = $video->id;
        $this->title = $video->title;
        $this->tag_id = $video->tag_id;
        $this->video_id = $video->video_id;
        $this->isEditing = true;

        $this->dispatch('scroll-to-form');
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function delete($id)
    {
        Videos::findOrFail($id)->delete();
        session()->flash('message', 'Video deleted.');
//        $this->videos = Videos::all();
    }


    public function update()
    {
        $this->validate([
            'title' => 'required',
            'tag_id' => 'required|exists:tags,id',
            'video_id' => 'required',
        ]);

        // Update existing video
        $video = Videos::findOrFail($this->videoId);

        $tag = Tags::find($this->tag_id);
        $video->update([
            'title' => $this->title,
            'tag' => $tag->slug,
            'tag_id' => $this->tag_id,
            'video_id' => $this->video_id,
        ]);

        session()->flash('message', 'Video updated successfully.');
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['title', 'tag_id', 'video_id', 'videoId', 'isEditing']);
    }

    public function render()
    {
        return view('livewire.admin.event-crud', [
            'videos' => Videos::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('tag', 'like', '%' . $this->search . '%')
                ->paginate(5),// Paginate with 5 items per page
        ]);
    }
}
