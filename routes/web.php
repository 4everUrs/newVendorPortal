<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Disposal;
use App\Http\Livewire\Content;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Posting;
use App\Http\Livewire\View;
use App\Http\Livewire\Record;
use App\Http\Livewire\Application;
use App\Http\Livewire\Orders;
use App\Http\Livewire\Register;
use Carbon\Carbon;

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
    return redirect('/home');
});

Route::get('/redirects', [LoginController::class, 'login']);

Route::get('shop', Disposal::class)->name('shop');
Route::get('home', Content::class)->name('home');
Route::get('posting', Posting::class)->name('posting');
Route::get('view/{list}/{id}', View::class)->name('view');

Route::get('signup', Register::class)->name('signup');
Route::post('create', [Register::class, 'create'])->name('create');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('apply{id}/{list}', Application::class)->name('apply');
    Route::get('cart', Cart::class)->name('cart');
    Route::get('orders', Orders::class)->name('orders');
    Route::get('record', Record::class)->name('record');
});
