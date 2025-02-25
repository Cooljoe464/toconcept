<?php

namespace App\Livewire;

use App\Models\Teams;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class TeamsCrud extends Component
{
    use WithFileUploads, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $teamId, $name, $photo;
    public $isEditMode = false;

    public $search = ''; // Added search property


    public function updatedSearch()
    {
        // This is now handled automatically by Livewire 3
        // If needed, you can add debounce:
        // $this->search = $value; // Assign the new value
    }

    public function render()
    {
        $teams = Teams::where('name', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.admin.teams-crud', compact('teams'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->photo = null;
        $this->teamId = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate([
            'name'  => 'required|string',
            'photo' => 'nullable|image|max:1024',
        ]);

        $photoPath = $this->photo ? Storage::disk('public')->putFile('teams', $this->photo) : null;

        Teams::create([
            'name'  => $this->name,
            'photo' => $photoPath,
        ]);

        session()->flash('message', 'Team member added successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $team = Teams::findOrFail($id);
        $this->teamId = $team->id;
        $this->name = $team->name;
        $this->photo = $team->photo;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate([
            'name'  => 'required|string',
            'photo' => 'nullable|image|max:1024',
        ]);

        $team = Teams::findOrFail($this->teamId);

        if ($this->photo) {
            if ($team->photo && Storage::disk('public')->exists($team->photo)) {
                Storage::disk('public')->delete($team->photo);
            }
            $photoPath = Storage::disk('public')->putFile('teams', $this->photo);
        } else {
            $photoPath = $team->photo;
        }

        $team->update([
            'name'  => $this->name,
            'photo' => $photoPath,
        ]);

        session()->flash('message', 'Team member updated successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $team = Teams::findOrFail($id);

        if ($team->photo && Storage::disk('public')->exists($team->photo)) {
            Storage::disk('public')->delete($team->photo);
        }

        $team->delete();
        session()->flash('message', 'Team member deleted successfully.');
    }
}
