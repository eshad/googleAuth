<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', 'AuthController@showLoginForm')->name('login');
Route::get('/', [AuthController::class,'showLoginForm'])->name('login');

Route::get('/generate-secret-and-qr', [AuthController::class,'generateSecretAndQR']);
Route::get('/testcode', [AuthController::class,'testCode']);
// Route::get('/authenticate', [AuthController::class,'authenticate'])->name('authenticate');
Route::post('/authenticate', [AuthController::class,'authenticate']);


Route::post('/login', [AuthController::class,'login']);
Route::get('/test', [AuthController::class,'test']);


// Route::post('/generate-secret-and-qr', 'AuthController@generateSecretAndQR');

