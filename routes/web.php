<?php

use Illuminate\Support\Facades\Route;

use Livewire\Livewire;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/etudiants', \App\Livewire\Etudiants::class)->name('etudiants');

Route::get('/contact', \App\Livewire\ContactezNous::class)->name('contact');
