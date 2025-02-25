<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\ClientCrud;
use App\Livewire\DashboardUtility;
use App\Livewire\EventCrud;
use App\Livewire\FaqCrud;
use App\Livewire\PortfolioCrud;
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
    $Clients = Client::all();
    $getTags = Tags::all();
    $tagIds = Tags::pluck('id')->toArray();
    $portfolios = Portfolio::whereIn('id', $tagIds)->inRandomOrder()->take(8)->get();
    return view('guests.index', compact('portfolios', 'getTags', 'homePage', 'Clients'));
})->name('landing');

Route::get('/about', function () {
    $homePage = HomePage::first();
    $Clients = Client::all();
    $Teams = Teams::all();
    $getTags = Tags::all();
    return view('guests.about', compact('getTags', 'homePage', 'Clients', 'Teams'));
})->name('about');

Route::get('/contact&booking', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    return view('guests.contacts', compact('getTags', 'homePage'));
})->name('contact');

Route::get('/portfolio', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    return view('guests.portfolio', compact('getTags', 'homePage'));
})->name('portfolio');

Route::get('/portfolios/{ids}', function ($ids) {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    $Portfolios = Portfolio::whereIn('tags_id', [$ids])->get();
    $PortfolioName = Portfolio::whereIn('tags_id', [$ids])->first();
    return view('guests.portfolio.index', compact('Portfolios', 'getTags', 'PortfolioName', 'homePage'));
})->name('portfolio.others');

Route::get('/services', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    return view('guests.services', compact('getTags', 'homePage'));
})->name('services');

Route::get('/faq', function () {
    $homePage = HomePage::first();
    $Faq = Faq::all();
    $Clients = Client::all();
    $getTags = Tags::all();
    return view('guests.modules', compact('getTags', 'homePage', 'Clients', 'Faq'));
})->name('faq');

Route::get('/legal', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    return view('guests.legal', compact('getTags', 'homePage'));
})->name('legal');

Route::get('/events', function () {
    $homePage = HomePage::first();
    $getTags = Tags::all();
    $videos = Videos::all();
    return view('guests.events', compact('videos', 'getTags', 'homePage'));
})->name('events');

Route::post('/send-mail', function (Request $request) {

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'message' => 'required|string',
    ]);
    Mail::to('cooljoe464@gmail.com')->send(new SendMail($validatedData));
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


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Auth::routes([
    'login' => false,
    'register' => false
]);

require __DIR__ . '/auth.php';
