<?php

namespace App\Livewire;

use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ClientCrud extends Component
{
    use WithFileUploads, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $clientId, $names, $links, $photos;
    public $isEditMode = false;
//    public $newPhoto;

    public $search = ''; // Added search property


    public function updatedSearch()
    {
        // This is now handled automatically by Livewire 3
        // If needed, you can add debounce:
        // $this->search = $value; // Assign the new value
    }

    public function render()
    {
        $clients = Client::where('names', 'like', '%' . $this->search . '%')
            ->orWhere('link', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('livewire.admin.client-crud', compact('clients'));
    }

    public function resetInputFields()
    {
        $this->names = '';
        $this->links = '';
        $this->photos = null;
        $this->clientId = null;
        $this->isEditMode = false;

    }

    public function store()
    {
        $this->validate([
            'names' => 'required|string|max:255',
            'links' => 'nullable|url',
            'photos' => 'image|max:2048|mimes:jpg,jpeg,png,gif,webp', // Max 2MB
        ]);

        $photoPath = $this->photos ? Storage::disk('public')->putFile('clients', $this->newPhoto) : null;

        Client::create([
            'names' => $this->names,
            'link' => $this->links,
            'photos' => $photoPath,
        ]);
        $this->updatedSearch();
        $this->resetInputFields();
        session()->flash('message', 'Client added successfully.');


    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $this->clientId = $client->uuid;
        $this->names = $client->names;
        $this->links = $client->link;
        $this->photos = $client->photos;
        $this->isEditMode = true;

        $this->dispatch('scroll-to-form');

    }

    public function update()
    {
        $this->validate([
            'names' => 'required|string|max:255',
            'links' => 'nullable|url',
            'photos' => 'image|max:2048||mimes:jpg,jpeg,png,gif,webp',
        ]);

        $client = Client::findOrFail($this->clientId);

        if ($this->photos) {
            if ($client->photos && Storage::disk('public')->exists($client->photos)) {
                Storage::disk('public')->delete($client->photos);
            }
            $photoPath = Storage::disk('public')->putFile('clients', $this->photos);
        } else {
            $photoPath = $client->photos;
        }

        $client->update([
            'names' => $this->names,
            'link' => $this->links,
            'photos' => $photoPath,
        ]);

        session()->flash('message', 'Client updated successfully.');
        $this->resetInputFields();
        $this->updatedSearch();
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);

        if ($client->photos && Storage::disk('public')->exists($client->photos)) {
            Storage::disk('public')->delete($client->photos);
        }

        $client->delete();
        session()->flash('message', 'Client deleted successfully.');
        $this->updatedSearch();
    }
}
