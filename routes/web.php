<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::group(['middleware' => 'auth'], function(){
Route::get('/home', [TodoController::class, 'index']);
Route::post('/home', [TodoController::class, 'create'])->name('home');
Route::post('/edit', [TodoController::class, 'edit']);
Route::post('/delete', [TodoController::class, 'delete']);
Route::get('/search', [TodoController::class, 'search']);
Route::post('/search', [TodoController::class, 'result'])->name('search');
});

Route::get('/', function () {
    return view('/Auth/login');
});

Route::get('/dashboard', function () {
    return redirect('/home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/logout', function() {
    Auth::logout();
    return view('/Auth/login');
});
