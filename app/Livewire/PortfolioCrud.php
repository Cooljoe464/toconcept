<?php

namespace App\Livewire;

use App\Models\Tags;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Portfolio;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PortfolioCrud extends Component
{
    use WithFileUploads, WithPagination;


    // To customize the pagination theme if needed (optional)
    protected $paginationTheme = 'bootstrap';
    // Form fields
    public $portfolioId, $title, $tags_id, $tags, $image, $search;

    // Flag to switch between create and edit mode
    public $isEditMode = false;


    // When updating any property, reset the page to 1
    protected $updatesQueryString = ['page'];

    // This property will hold the available tags from the database.
    public $availableTags = [];


    public function updatedSearch()
    {
        // This is now handled automatically by Livewire 3
        // If needed, you can add debounce:
        // $this->search = $value; // Assign the new value
    }

    // Load available tags from the database during component mount
    public function mount()
    {
        // Retrieve tags as an associative array: [id => name]
        $this->availableTags = Tags::all()->pluck('name', 'uuid')->toArray();
    }


    public function render()
    {
        $availableTags = Tags::all();
        $portfolios = Portfolio::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('tags', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('livewire.admin.portfolio-crud', compact('portfolios', 'availableTags'));
    }

    // Reset all form input fields
    public function resetInputFields()
    {
        $this->title = '';
        $this->tags_id = '';
        $this->tags = '';
        $this->image = null;
        $this->portfolioId = null;
        $this->isEditMode = false;
    }

    // Store a new portfolio
    public function store()
    {
        try {
            $this->validate([
                'title' => 'required|string',
                'tags' => 'required|string',
                'image' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,webp', // Maximum 2MB
            ]);

            // Use Storage facade to store the image file if provided.
            $imagePath = $this->image
                ? Storage::disk('public')->putFile('portfolios', $this->image)
                : null;
            $tag = Tags::find($this->tags);

            Portfolio::create([
                'title' => $this->title,
                'tags_id' => $tag->uuid,
                'tags' => strtolower($tag->name),
                'image' => $imagePath,
            ]);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage().' Line: '.$exception->getLine());
        }

        session()->flash('message', 'Portfolio created successfully.');
        $this->resetInputFields();
    }

    // Load a portfolio for editing
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $this->portfolioId = $portfolio->uuid;
        $this->title = $portfolio->title;
        $this->tags_id = $portfolio->tags_id; // This will update the select field.
        $this->tags = strtolower($portfolio->tags);
        // We don't preload the image file for editing
        $this->isEditMode = true;

        // Dispatch a browser event to scroll to the form
        $this->dispatch('scroll-to-form');
    }

    // Update an existing portfolio
    public function update()
    {
        try {
            $this->validate([
                'title' => 'required|string',
                'tags_id' => 'required|string',
                'tags' => 'required|string',
                'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,webp', // Maximum 2MB
            ]);

            $portfolio = Portfolio::findOrFail($this->portfolioId);
            // If a new image is uploaded, delete the old file and store the new one.
            if ($this->image) {
                if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                    Storage::disk('public')->delete($portfolio->image);
                }
                $imagePath = Storage::disk('public')->putFile('portfolios', $this->image);
            } else {
                $imagePath = $portfolio->image;
            }
            $portfolio->update([
                'title' => $this->title,
                'tags_id' => $this->tags_id,
                'tags' => strtolower($this->tags),
                'image' => $imagePath,
            ]);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage().' Line: '.$exception->getLine());
        }

        session()->flash('message', 'Portfolio updated successfully.');
        $this->resetInputFields();
    }

    // Delete a portfolio record
    public function delete($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();
        session()->flash('message', 'Portfolio deleted successfully.');
    }
}
