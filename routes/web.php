<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Website\Home\Home::class)->name('home');
Route::get('/properties', \App\Livewire\Website\Projects\Projects::class)->name('properties');
Route::get('/properties/{slug}', \App\Livewire\Website\Projects\ProjectDetails::class)->name('properties.details');
Route::get('/offers', \App\Livewire\Website\Offers\Offers::class)->name('offers');
Route::get('/blogs',\App\Livewire\Website\Blogs\Blogs::class)->name('blogs');
Route::get('/contact-us',\App\Livewire\Website\Contact\ContactUs::class)->name('contact');
Route::get('/clients',\App\Livewire\Website\Clients\Clients::class)->name('clients');
Route::get('/landowners',\App\Livewire\Website\Landowners\Landowners::class)->name('landowners');
Route::get('/terms-and-conditions',\App\Livewire\Website\Pages\Terms::class)->name('terms');
Route::get('/privacy-policy',\App\Livewire\Website\Pages\PrivacyPolicy::class)->name('privacy');
Route::get('/about-us',\App\Livewire\Website\Pages\About::class)->name('about');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/test',function (){
    return view('test');
});
