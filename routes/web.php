<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\GroupController;
use App\Http\Controllers\UploadedImageController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::group([
        'controller' => UploadedImageController::class, 
        'prefix' => 'images'
    ], function() {
        Route::get('/', 'index')->name('images.index');
        Route::post('/store', 'store')->name('images.store');
        Route::delete('/destroy/{id}', 'destroy')->name('images.destroy');
    });
    
    Route::group([
        'controller' => GroupController::class,
        'prefix' => 'group'
    ], function() {
        Route::get('/', 'index')->name('group.index');
        Route::get('/create', 'create')->name('group.create');
        Route::post('/store', 'store')->name('group.store');
        Route::get('/edit/{id}', 'edit')->name('group.edit');
        Route::patch('/update/{id}', 'update')->name('group.update');
        Route::delete('/destroy/{id}', 'destroy')->name('group.destroy');
    });
});

require __DIR__.'/auth.php';
