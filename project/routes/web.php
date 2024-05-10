<?php

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
    return view('home', ['dashboard' => \App\Livewire\Dashboard::class]);
})->name('home');

Route::get('/play', function () {
    return view('pages.play', ['memoryGame' => \App\Livewire\MemoryGame::class]);
})->name('play');

Route::get('/high-scores', function () {
    return view('pages.high-scores', ['scores' => \App\Models\Score::orderBy('score', 'desc')->take(15)->get()]);
})->name('high-scores');

Route::get('/credits', function () {
    return view('pages.credits', ['credits' => \App\Models\Credit::all()]);
})->name('credits');
