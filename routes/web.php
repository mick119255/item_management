<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//ホーム画面

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//商品登録
Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('items')->middleware(['auth', 'isAdmin']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add'])->middleware(['auth', 'isAdmin']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});

//更新
Route::post('/items/store', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::patch('/items/update/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');

//詳細画面
Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('detail');

//編集画面
Route::get('/items/edit/{item}', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');

//削除
Route::delete('/items/destroy{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');


//ユーザーマスター
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index')->middleware(['auth', 'isAdmin']);
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::post('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
Route::get('/user/register', [App\Http\Controllers\UserController::class, 'register'])->name('user.register');
Route::post('/user/register', [App\Http\Controllers\UserController::class, 'store'])->name('register.store');


Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);
Route::get('auth/password/login', [App\Http\Controllers\UserController::class, 'login']);