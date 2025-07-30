<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\HomePage;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DashboardUtility extends Component
{
    use WithFileUploads;

    public $uuid, $video_id, $biography_home, $biography_footer, $biography_about, $biography_photo, $photo;
    public $email1, $email2, $phone1, $phone2, $address, $map_address;
    public $facebook, $twitter, $instagram, $tiktok, $linkedin, $youtube;
    public $no_of_portfolios, $no_of_clients;

    public function mount()
    {
        $homePage = HomePage::first();
        if ($homePage) {
            $this->uuid = $homePage->uuid;
            $this->video_id = $homePage->video_id;
            $this->biography_home = $homePage->biography_home;
            $this->biography_footer = $homePage->biography_footer;
            $this->biography_about = $homePage->biography_about;
            $this->photo = $homePage->biography_photo;
            $this->email1 = $homePage->email1;
            $this->email2 = $homePage->email2;
            $this->phone1 = $homePage->phone1;
            $this->phone2 = $homePage->phone2;
            $this->address = $homePage->address;
            $this->map_address = $homePage->map_address;
            $this->facebook = $homePage->facebook;
            $this->twitter = $homePage->twitter;
            $this->instagram = $homePage->instagram;
            $this->tiktok = $homePage->tiktok;
            $this->linkedin = $homePage->linkedin;
            $this->youtube = $homePage->youtube;
        }
        $this->no_of_portfolios = Portfolio::count();
        $this->no_of_clients = Client::count();
    }

    public function update()
    {
        $this->validate([
            'video_id' => 'required',
            'email1' => 'required|email',
            'email2' => 'nullable|email',
            'phone1' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'address' => 'required',
            'map_address' => 'nullable|string',
            'biography_home' => 'required|string',
            'biography_about' => 'required|string',
            'biography_footer' => 'required|string',
            'biography_photo' => 'max:2048',
        ]);

        $homePage = HomePage::firstOrCreate(['uuid' => $this->uuid]);

        $homePage->update([
            'video_id' => $this->video_id,
            'biography_home' => $this->biography_home,
            'biography_footer' => $this->biography_footer,
            'biography_about' => $this->biography_about,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'address' => $this->address,
            'map_address' => $this->map_address,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,
            'linkedin' => $this->linkedin,
        ]);

        if ($this->biography_photo) {
            $photoPath = $this->biography_photo ? Storage::disk('public')->putFile('biography', $this->biography_photo) : null;
            $homePage->update(['biography_photo' => $photoPath]);
        }

        $this->dispatch('scroll-to-form');
        session()->flash('message', 'Successfully updated!');
    }

    public function render()
    {
        return view('livewire.admin.dashboard-utility');
    }
}
