<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Content;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Posting;
use App\Http\Livewire\View;
use App\Http\Livewire\Record;

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
    return redirect ('/home');
});
Route::get('shop',Shop::class)->name('shop');
Route::get('home',Content::class)->name('home');
Route::get('cart',Cart::class)->name('cart');
Route::get('posting',Posting::class)->name('posting');
Route::get('view',View::class)->name('view');
Route::get('record',Record::class)->name('record');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
