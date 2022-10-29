<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AzaController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CardController;

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

Route::get('/', fn  () =>  view('welcome'));

Route::get('/dashboard',  fn () => view('admin.index'))->middleware(['auth'])->name('dashboard');

Route::get('/cards/create', [CardController::class, 'create'])->middleware(['auth'])->name('cards.create');

Route::post('/cards/store', [CardController::class, 'store'])->middleware(['auth'])->name('cards.store');

Route::get('/cards', [CardController::class, 'index'] )->middleware(['auth'])->name('cards.index');


Route::get('/profile',[AzaController::class, 'profile'] )->middleware(['auth'])->name('profile');

Route::post('/profile',[AzaController::class, 'profile_store'] )->middleware(['auth'])->name('profile.store');


Route::get('/accounts', [AzaController::class, 'index'])->middleware(['auth'])->name('accounts.index');

Route::get('/accounts/create',[AzaController::class, 'create'])->middleware(['auth'])->name('accounts.create');

Route::post('/accounts', [AzaController::class, 'store'])->middleware(['auth'])->name('accounts.store');

Route::get('/accounts/{aza}', [AzaController::class, 'edit'])->middleware(['auth'])->name('accounts.edit');

Route::patch('/accounts/{aza}', [AzaController::class, 'update'])->middleware(['auth'])->name('accounts.update');

Route::delete('/accounts/{aza}', [AzaController::class, 'destroy'])->middleware(['auth'])->name('accounts.destroy');


Route::get('/payments', function () {
    return view('admin.payments');
})->middleware(['auth'])->name('payments.index');


Route::get('/payments/create', function () {
    return view('admin.add_payment');
})->middleware(['auth'])->name('payments.create');

Route::get('/transactions', function () {
    return view('admin.transactions');
})->middleware(['auth'])->name('transactions.index');



require __DIR__.'/auth.php';
