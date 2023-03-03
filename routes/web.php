<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Cms\CreateUpdatePage;
use App\Http\Livewire\Cms\Page;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('pages', Page::class)->name('cms.pages');
    Route::get('page/{createUpdate}/{id?}', CreateUpdatePage::class)->name('cms.page.create');
});

// Route::get('cms', [PageController::class, 'index'])->name('page.index');
Route::get('cms/show/{slug1}/{slug2?}/{slug3?}', [PageController::class, 'show'])->name('page.show');

require __DIR__.'/auth.php';
