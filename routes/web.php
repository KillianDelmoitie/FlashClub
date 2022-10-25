<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DjController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PagesController::class, 'maintenance']);
// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
// {
// 	Route::get('/', [PagesController::class, 'index'])->name('index')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']);
//     Route::get('/contact', [PagesController::class, 'contact'])->name('contact')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']);
//     Route::get('/events', [EventController::class, 'events'])->name('events')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']);
//     Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']);
//     Route::get('/gallery/{id}', [GalleryController::class, 'galleryAlbum'])->name('gallery.album')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']);
// });



// //FORMS
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.post');

// //Logged IN
// Route::get('/dashboard', function () {
//     return view('loggedIn.dashboard');
// })->middleware(['auth'])->name('dashboard');


// //EVENTS

// Route::get('/dashboard/event', [EventController::class, 'index'])->name('eventmanaging')->middleware(['auth']);
// Route::post('/dashboard/event', [EventController::class, 'store'])->name('eventstore')->middleware(['auth']);
// Route::post('/dashboard/event/delete/{id}', [EventController::class, 'destroy'])->name('event.delete')->middleware(['auth']);
// Route::get('/dashboard/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit')->middleware(['auth']);
// Route::post('/dashboard/event/update/{id}', [EventController::class, 'update'])->name('event.update')->middleware(['auth']);
// Route::get('/dashboard/event/editphoto/{id}', [EventController::class, 'editphoto'])->name('event.editphoto')->middleware(['auth']);
// Route::post('/dashboard/event/updatephoto/{id}', [EventController::class, 'updatephoto'])->name('event.updatephoto')->middleware(['auth']);

// //GALLERY

// Route::post('gallery/delete/{id}', [GalleryController::class, 'destroyAlbum'])->name('delete.album');
// Route::get('/dashboard/gallery', [GalleryController::class, 'index'])->name('gallerymanaging')->middleware(['auth']);
// Route::post('/dashboard/gallery', [GalleryController::class, 'store'])->name('gallerypost')->middleware(['auth']);

// Route::get('/dashboard/gallery/album/{id}', [GalleryController::class, 'editalbum'])->name('edit.album')->middleware(['auth']);
// Route::post('/dashboard/gallery/albumupdate/{id}', [GalleryController::class, 'updateAlbum'])->name('update.Album')->middleware(['auth']);
// Route::get('/dashboard/gallery/album/cover/{id}', [GalleryController::class, 'editcover'])->name('edit.cover')->middleware(['auth']);
// Route::post('/dashboard/gallery/updatephoto/{id}', [GalleryController::class, 'updatecover'])->name('update.cover')->middleware(['auth']);

// Route::get('/dashboard/gallery/{id}', [GalleryController::class, 'addpic'])->name('addpic')->middleware(['auth']);
// Route::post('/dashboard/gallery/{id}', [GalleryController::class, 'addpictures'])->name('addpictures')->middleware(['auth']);
// Route::post('/dashboard/gallery/delete/{id}', [GalleryController::class, 'destroypicture'])->name('delete.picture')->middleware(['auth']);

// //djs
// Route::get('/dashboard/dj', [DjController::class, 'index'])->name('djmanaging')->middleware(['auth']);
// Route::post('/dashboard/dj', [DjController::class, 'store'])->name('djmanaging.store')->middleware(['auth']);
// Route::post('/dashboard/dj/delete/{id}', [DjController::class, 'destroy'])->name('dj.delete')->middleware(['auth']);
// Route::get('/dashboard/dj/edit/{id}', [DjController::class, 'edit'])->name('dj.edit')->middleware(['auth']);
// Route::post('/dashboard/dj/update/{id}', [DjController::class, 'update'])->name('dj.update')->middleware(['auth']);
// Route::get('/dashboard/dj/editphoto/{id}', [DjController::class, 'editphoto'])->name('dj.editphoto')->middleware(['auth']);
// Route::post('/dashboard/dj/updatephoto/{id}', [DjController::class, 'updatephoto'])->name('dj.updatephoto')->middleware(['auth']);



require __DIR__.'/auth.php';
