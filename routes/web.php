<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Etudiants;
use App\Livewire\ContactezNous;

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

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes Livewire
Route::prefix('')->group(function () {
    Route::get('/etudiants', Etudiants::class)->name('etudiants');
    Route::get('/contact', ContactezNous::class)->name('contact');
});

// Authentification (si utilisée)
// Auth::routes();
