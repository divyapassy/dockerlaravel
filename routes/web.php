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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/deposit', [App\Http\Controllers\DepositeController::class,'deposit'])->name('deposit');
Route::get('/mark-as-read', [App\Http\Controllers\DepositeController::class,'markAsRead'])->name('mark-as-read');
Route::get('/food/menu', function () {
    $menu = [
        'Burger' => 10,
        'Pizza' => 12,
        'Pasta' => 8,
        'Salad' => 6,
    ];

    return view('menu', ['menu' => $menu]);
});
Route::post('/order/{item}', function ($item) {
    event(new FoodOrderedEvent($item));
    return redirect('/');
})->name('order');