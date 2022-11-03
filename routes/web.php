<?php

use App\Models\Aza;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AzaController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', fn () =>  view('welcome'));

Route::get('/dashboard',  fn () => view('admin.index'))->middleware(['auth'])->name('dashboard');

// cards

Route::get('/cards', [CardController::class, 'index'])->middleware(['auth'])->name('cards.index');

Route::get('/cards/create', [CardController::class, 'create'])->middleware(['auth'])->name('cards.create');

Route::get('/cards/{card}', [CardController::class, 'show'])->middleware(['auth'])->name('cards.show');

Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->middleware(['auth'])->name('cards.edit');

Route::patch('/cards/{card}', [CardController::class, 'update'])->middleware(['auth'])->name('cards.update');

Route::post('/cards/store', [CardController::class, 'store'])->middleware(['auth'])->name('cards.store');

Route::delete('/cards/{card}', [CardController::class, 'destroy'])->middleware(['auth'])->name('cards.destroy');

// 

Route::get('/profile', [AzaController::class, 'profile'])->middleware(['auth'])->name('profile');

Route::post('/profile', [AzaController::class, 'profile_store'])->middleware(['auth'])->name('profile.store');


// Route::get('/accounts', [AzaController::class, 'index'])->middleware(['auth'])->name('accounts.index');

// Route::get('/accounts/create', [AzaController::class, 'create'])->middleware(['auth'])->name('accounts.create');

// Route::post('/accounts', [AzaController::class, 'store'])->middleware(['auth'])->name('accounts.store');

// Route::get('/accounts/{aza}', [AzaController::class, 'edit'])->middleware(['auth'])->name('accounts.edit');

// Route::patch('/accounts/{aza}', [AzaController::class, 'update'])->middleware(['auth'])->name('accounts.update');

// Route::delete('/accounts/{aza}', [AzaController::class, 'destroy'])->middleware(['auth'])->name('accounts.destroy');





/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resources([
        // 'plural form of resouce' => ControllerForResource
        'payments' => PaymentController::class,
        'accounts' => AzaController::class,

    ]);
});

Route::get('/transactions', function () {
    return view('admin.transactions');
})->middleware(['auth'])->name('transactions.index');



require __DIR__ . '/auth.php';
