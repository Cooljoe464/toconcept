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

    public $title, $tags_id, $tags, $video_id, $videoId;
//    public $tags;
    public $isEditing = false;

    public $search = ''; // Added search property

    public $availableTags = [];

    public function mount(): void
    {
        $this->availableTags = Tags::all()->pluck('name', 'uuid')->toArray();
    }

    public function save(): void
    {
        $this->validate([
            'title' => 'required',
//            'tags' => 'required|exists:tags,name',
            'tags_id' => 'required|exists:tags,uuid',
            'video_id' => 'required',
        ]);
        $tag = Tags::find($this->tags_id);
        // Create new video
        Videos::create([
            'title' => $this->title,
            'tag' => $tag->name,
            'tag_id' => $this->tags_id,
            'video_id' => $this->video_id,
        ]);

        session()->flash('message', 'Video added successfully.');

        $this->resetForm();
    }


    public function edit($id): void
    {
        $video = Videos::findOrFail($id);
        $this->videoId = $video->uuid;
        $this->title = $video->title;
        $this->tags_id = $video->tag_id;
        $this->tags = $video->tag;
        $this->video_id = $video->video_id;
        $this->isEditing = true;

        $this->dispatch('scroll-to-form');
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function delete($id): void
    {
        Videos::findOrFail($id)->delete();
        session()->flash('message', 'Video deleted.');
//        $this->videos = Videos::all();
    }


    public function update(): void
    {
        $this->validate([
            'title' => 'required|string',
            'tag_id' => 'required|exists:tags,id',
            'video_id' => 'required',
        ]);

        // Update existing video
        $video = Videos::findOrFail($this->videoId);

        $tag = Tags::find($this->tags_id);
        $video->update([
            'title' => $this->title,
            'tag' => $tag->slug,
            'tag_id' => $this->tags_id,
            'video_id' => $this->video_id,
        ]);

        session()->flash('message', 'Video updated successfully.');
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->reset(['title', 'tags_id', 'video_id', 'videoId', 'isEditing']);
    }

    public function render()
    {
        return view('livewire.admin.event-crud', [
            'videos' => Videos::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('tag', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(5),// Paginate with 5 items per page
        ]);
    }
}
