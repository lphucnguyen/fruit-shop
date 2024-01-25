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

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', App\Http\Controllers\Invoice\ShowController::class)->name('invoice.index');

    Route::get('/invoice', App\Http\Controllers\Invoice\AddController::class)->name('invoice.add');
    Route::delete('/invoice', App\Http\Controllers\Invoice\DeleteController::class)->name('invoice.delete');
    Route::get('/invoice/{id}', App\Http\Controllers\Invoice\EditController::class)->name('invoice.edit');
    Route::get('/print-invoice/{id}', App\Http\Controllers\Invoice\PrintController::class)->name('invoice.print');

    Route::get('/category', App\Http\Controllers\Category\ShowController::class)->name('category.index');
    Route::get('/category/add', App\Http\Controllers\Category\AddController::class)->name('category.add');
    Route::post('/category', App\Http\Controllers\Category\CreateController::class)->name('category.create');

    Route::get('/fruit', App\Http\Controllers\Fruit\ShowController::class)->name('fruit.index');
    Route::get('/fruit/add', App\Http\Controllers\Fruit\AddController::class)->name('fruit.add');
    Route::post('/fruit', App\Http\Controllers\Fruit\CreateController::class)->name('fruit.create');

    Route::get('/setting', App\Http\Controllers\User\ShowController::class)->name('setting.index');
    Route::post('/setting', App\Http\Controllers\User\UpdateController::class)->name('setting.update');
});

Route::get('/logout', App\Http\Controllers\Authentication\LogoutController::class)
    ->middleware('auth')
    ->name('authentication.logout');
Route::get('/', App\Http\Controllers\Authentication\ShowLoginController::class)
    ->name('authentication.index');
Route::post('/login', App\Http\Controllers\Authentication\LoginController::class)
    ->name('authentication.login');
