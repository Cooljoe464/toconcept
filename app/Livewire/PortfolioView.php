<?php

namespace App\Livewire;

use App\Models\Tags;
use Illuminate\Container\Attributes\Tag;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Portfolio;

class PortfolioView extends Component
{

    // Define the number of images to load per batch
    public $perPage = 6;

    // This method increments the number of images to load
    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function render()
    {
        $tags = Tags::all();
//        $Portfolios = Portfolio::latest()->take($this->perPage)->get();
        $Portfolios = Portfolio::latest()->get();

        $formattedImages = $Portfolios->map(function ($portfolio) {
            return [
                'slide_type' => 'image',
                'img'        => Storage::url( $portfolio->image),
                'thmb'       => Storage::url($portfolio->image),
                'title'      => $portfolio->title,
                'categ'      => $portfolio->tags,
            ];
        });
        // Dispatch a browser event so that JS can update the gallery.
        // (This event will be sent on the initial render and after each update.)
//        $this->dispatch('updateAlbums', ['images' => $formattedImages]);

        return view('livewire.portfolio-view', ['Portfolios' => $Portfolios, 'tags' => $tags]);
    }

    private function dispatchBrowserEvent(string $string, array $array)
    {
    }
}
