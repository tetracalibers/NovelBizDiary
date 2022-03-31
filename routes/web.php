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
        'name' => 'uploadImage.',
        'prefix' => 'images'
    ], function() {
        Route::get('/', 'index')->name('index');
        Route::get('/upload', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::group([
        'controller' => GroupController::class,
        'name' => 'group.',
        'prefix' => 'group'
    ], function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });
});

require __DIR__.'/auth.php';
