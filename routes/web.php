<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
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
    return view('index');
});

//ユーザーコントローラー

Route::get('/register',[UserController::class,'showRegister'])->name('register');
Route::post('/register',[UserController::class,'register']);

Route::middleware('auth')->group(function(){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('logout',[UserController::class,'logout'])->name('user.logout');
});

Route::get('/login',[UserController::class,'showLogin'])->name('login');

Route::post('/login',[UserController::class,'login']);


//ブックコントローラー

Route::get('/bookRegister',[BookController::class,'showbookRegister'])->name('bookRegister');
Route::post('/bookRegister',[BookController::class,'bookRegister']);

Route::get('/bookErase',[BookController::class,'showbookErase'])->name('bookErase');
Route::post('/bookErase',[BookController::class,'showbookErase']);
Route::post('/bookDelete',[BookController::class,'bookDelete']); 


Route::get('/bookIndex',[BookController::class,'bookIndex'])->name('bookIndex');
Route::post('/bookStore',[BookController::class,'review']);


//レビューコントローラー
Route::get('/reviewInsert',[ReviewController::class,'reviewInsert']);
Route::post('/reviewShow',[ReviewController::class,'reviewShow']);

Route::get('/reviewList',[ReviewController::class,'reviewList']);
Route::post('/reviewList',[ReviewController::class,'reviewList']);

//レビューの編集画面に行く
Route::get('/reviewEdit',[ReviewController::class,'reviewEdit']);

//レビューの更新
Route::post('/reviewUpdate',[ReviewController::class,'reviewUpdate']);

//レビューの削除画面に行く
Route::get('/reviewErase',[ReviewController::class,'reviewErase']);
//レビューの削除
Route::post('/reviewDelete',[ReviewController::class,'reviewDelete']);