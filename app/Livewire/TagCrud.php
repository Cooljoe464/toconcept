<?php

namespace App\Livewire;

use App\Models\Tags;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class TagCrud extends Component
{
    use WithFileUploads, WithPagination;


    // To customize the pagination theme if needed (optional)
    protected $paginationTheme = 'bootstrap';
    // Form fields
    public $tag_id, $name, $slug, $description, $search;

    // Flag to switch between create and edit mode
    public $isEditMode = false;

    // When updating any property, reset the page to 1
    protected $updatesQueryString = ['page'];

    // This property will hold the available tags from the database.
    public $availableTags = [];

    public function render()
    {
        $tags = Tags::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('slug', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('livewire.admin.tag-crud', compact('tags'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->tag_id = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        try {
            $this->validate([
                'name' => 'required|string:max:255',
                'description' => 'required|string:max:255',
            ]);

            Tags::create([
                'name' => $this->name,
                'slug' => strtolower($this->name),
                'description' => $this->description
            ]);
        } catch (\Exception $exception) {
            session()->flash('message', $exception->getMessage().'=>'.$exception->getLine());
        }

        session()->flash('message', 'Tag created successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $tags = Tags::findOrFail($id);
        $this->name = $tags->name;
        $this->slug = $tags->slug;
        $this->tag_id = $tags->uuid;
        $this->description = $tags->description;
        $this->isEditMode = true;

        // Dispatch a browser event to scroll to the form
        $this->dispatch('scroll-to-form');
    }


    public function update()
    {
//        try {
            $this->validate([
                'name' => 'required|string:max:255',
                'slug' => 'required|string:max:255',
                'description' => 'string:max:255',
            ]);

            $tags = Tags::findOrFail($this->tag_id);

            $tags->update([
                'question' => $this->name,
                'slug' => strtolower($this->slug) ? strtolower($this->slug) : strtolower($this->name),
                'description' => $this->description
            ]);
            // Dispatch a browser event to scroll to the form
            $this->dispatch('scroll-to-form');
//        } catch (\Exception $exception) {
//            Log::warning($exception);
//        }

        session()->flash('message', "Tag updated successfully.");
        $this->resetInputFields();
    }

    // Delete a portfolio record
    public function delete($id)
    {
        $tags = Tags::findOrFail($id);
        $tags->delete();
        session()->flash('message', "Tag deleted successfully.");
    }

}
