<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\ClientCrud;
use App\Livewire\DashboardUtility;
use App\Livewire\EventCrud;
use App\Livewire\FaqCrud;
use App\Livewire\PortfolioCrud;
use App\Livewire\TagCrud;
use App\Livewire\TeamsCrud;
use App\Mail\SendMail;
use App\Models\Client;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\Portfolio;
use App\Models\Tags;
use App\Models\Teams;
use App\Models\Videos;
use Illuminate\Container\Attributes\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $homePage = HomePage::first();
    $Clients = Client::orderBy('created_at', 'desc')->get();
    $getTags = Tags::all();
//    $tagIds = Tags::pluck('id')->toArray();
    $portfolios = Portfolio::orderBy('created_at', 'desc')->take(8)->get();
    return view('guests.index', compact('portfolios', 'getTags', 'homePage', 'Clients'));
})->name('landing');

Route::get('/about', function () {
    $homePage = HomePage::first();
    $Clients = Client::orderBy('created_at', 'desc')->get();
    $Teams = Teams::all();
    $getTags = Tags::all();
    return view('guests.about', compact('getTags', 'homePage', 'Clients', 'Teams'));
})->name('about');

Route::get('/contacts', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    return view('guests.contacts', compact('getTags', 'homePage'));
})->name('contact');

Route::get('/portfolio', function () {
    $homePage = HomePage::first();
    $Tags = Portfolio::select('tags_id')->distinct()->pluck('tags_id')->toArray();
    $getTags = Tags::whereIn('uuid', $Tags)->get();
    return view('guests.portfolio', compact('getTags', 'homePage'));
})->name('portfolio');

Route::get('/portfolios/{ids}', function ($ids) {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    $Portfolios = Portfolio::whereIn('tags_id', [$ids])->get();
//    $PortfolioName = Portfolio::whereIn('tags_id', [$ids])->first();
    $tagName = Tags::find($ids);

    return view('guests.portfolio.index', compact('Portfolios', 'getTags', 'homePage','tagName'));
})->name('portfolio.others');

Route::get('/services', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    return view('guests.services', compact('getTags', 'homePage'));
})->name('services');

Route::get('/faq', function () {
    $homePage = HomePage::first();
    $Faq = Faq::all();
    $Clients = Client::orderBy('created_at', 'desc')->get();
    $getTags = Tags::all();
    return view('guests.modules', compact('getTags', 'homePage', 'Clients', 'Faq'));
})->name('faq');

Route::get('/legal', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    return view('guests.legal', compact('getTags', 'homePage'));
})->name('legal');

Route::get('/videos', function () {
    $homePage = HomePage::first();
    $Tags = Videos::select('tag_id')->distinct()->pluck('tag_id')->toArray();
    $getTags = Tags::whereIn('uuid', $Tags)->get();
    $videos = Videos::all();
    return view('guests.events', compact('videos', 'getTags', 'homePage'));
})->name('videos');

Route::post('/send-mail', function (Request $request) {

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'gender' => 'required|string|max:6',
        'shoot_type' => 'required|string|max:20',
        'location' => 'required|string|max:255',
        'no_of_individuals' => 'required|string|max:255',
        'referred' => 'required|string|max:255',
        'message' => 'required|string',
    ]);
    Mail::to('joelonyedinefu@gmail.com')->send(new SendMail($validatedData));
    return response()->json([
        'status' => 'success',
        'message' => 'Mail sent successfully'
    ], 200);
})->name('send-mail');


Route::middleware(['auth',
//    'verified'
])->group(function () {
    //PortfolioView crud
    Route::get('/admin/portfolio', PortfolioCrud::class)->name('portfolio-crud');
    Route::get('/admin/clients', ClientCrud::class)->name('client-crud');
    Route::get('/admin/teams', TeamsCrud::class)->name('team-crud');
    Route::get('/admin/events', EventCrud::class)->name('event-crud');
    Route::get('/admin/faq', FaqCrud::class)->name('faq-crud');
    Route::get('/admin/tags', TagCrud::class)->name('tags-crud');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/linkStorage', function (){
        $target = '/home/toconcep/public_html/test.toconcepts.com/storage/app/public';
        $link = '/home/toconcep/public_html/test.toconcepts.com/public/storage';

        if (symlink($target, $link)) {
            echo 'Storage linked successfully!';
        } else {
            echo 'Failed to link storage.';
        }
    });
});
//Auth::routes([
//    'login' => true,
//    'register' => false
//]);

require __DIR__ . '/auth.php';
