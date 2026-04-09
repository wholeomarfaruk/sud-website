<?php

use App\Http\Controllers\Admin\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login')->withoutMiddleware(middleware: ['auth','admin','panel:admin']);
Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'loginAction'])->name('login.action')->withoutMiddleware(middleware: ['auth','admin','panel:admin']);

Route::get('/dashboard', \App\Livewire\Admin\Dashboard\Dashboard::class)->name('dashboard');

//user managements
Route::get('/users', App\Livewire\Admin\Users\Users::class)->name('users');

//permissions
Route::get('/permissions/roles', App\Livewire\Admin\Permissions\RoleList::class)->name('roles.list');
Route::get('/permissions/role/create', App\Livewire\Admin\Permissions\RoleCreate::class)->name('roles.create');
Route::get('/permissions/role/edit/{id}', App\Livewire\Admin\Permissions\RoleEdit::class)->name('roles.edit');

//uploads
Route::get('/uploads', App\Livewire\Admin\File\Uploads::class)->name('uploads');
Route::post('/upload', [FileUploadController::class, 'storeAdmin']);
Route::delete('/upload/revert', [FileUploadController::class, 'revertAdmin']);

//hero sliders
Route::get('/sliders', App\Livewire\Admin\Slider\Slider::class)->name('sliders');
Route::get('/sliders/create', App\Livewire\Admin\Slider\CreateSlide::class)->name('sliders.create');



// properties
Route::get('/properties', App\Livewire\Admin\Properties\Properties::class)->name('properties');
Route::get('/properties/create', App\Livewire\Admin\Properties\Create::class)->name('properties.create');
Route::get('/properties/locations', App\Livewire\Admin\Properties\Locations::class)->name('properties.locations');
Route::get('/properties/featured-properties', App\Livewire\Admin\Properties\FeaturedProperty::class)->name('properties.featured');


//videos
Route::get('/videos', App\Livewire\Admin\Videos\Videos::class)->name('videos');

//partners
Route::get('/partners', App\Livewire\Admin\Partners\Partners::class)->name('partners');


//Offers
Route::get('/offers', App\Livewire\Admin\Offers\Offers::class)->name('offers');
Route::get('/offers/create-update', App\Livewire\Admin\Offers\CreateUpdate::class)->name('offers.createupdate');

//blogs
Route::get('/blogs', App\Livewire\Admin\Blogs\Blogs::class)->name('blogs');
Route::get('/blogs/create-update', App\Livewire\Admin\Blogs\CreateUpdate::class)->name('blogs.createupdate');


//inquires/inbox
Route::get('/inbox', App\Livewire\Admin\Inbox\InquiryList::class)->name('inbox');

//board members
Route::get('/members', App\Livewire\Admin\Members\Members::class)->name('members');
