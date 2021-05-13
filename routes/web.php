<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
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
    $todos = Todo::orderBy('created_at', 'desc')->get(); 
    return view('index' ,compact('todos'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();



Route::resource('todo', TodoController::class)->except(['show'])->middleware(['auth']);
Route::get('/todo/{id}' , [TodoController::class, 'show'])->name('todo.show');

require __DIR__.'/auth.php';
Auth::routes();