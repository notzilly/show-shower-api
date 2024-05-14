<?php

use App\Livewire\ListShows;
use App\Livewire\ShowShows;
use Illuminate\Support\Facades\Route;

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

Route::get('/shows', ListShows::class);
Route::get('/shows/{id}', ShowShows::class);
