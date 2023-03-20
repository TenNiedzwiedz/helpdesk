<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResponsesController;
use App\Http\Controllers\SubmissionsController;
use App\Http\Controllers\UsersController;
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
    return view('main');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::controller(UsersController::class)->group(function () {
    Route::get('users', 'viewAll');
    Route::get('users/new', 'create');
    Route::post('users', 'store');
});

Route::controller(SubmissionsController::class)->group(function () {
    Route::get('submissions', 'viewAll');
    Route::get('submissions/new', 'create');
    Route::post('submissions', 'store');
    Route::get('submissions/{id}', 'view');
});

Route::controller(ResponsesController::class)->group(function () {
    Route::post('response/{type}/{submission_id}', 'store');
});
