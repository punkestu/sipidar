<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;

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

Route::middleware('guest')->get('/', function () {
    return view('welcome');
})->name('welcome');
Route::middleware('guest')->get('/login', [AuthController::class, 'loginView'])->name('login');
Route::middleware('guest')->post('/login', [AuthController::class, 'login']);
Route::middleware('auth')->get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => '/order', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => '/create', 'middleware' => 'is.admin'], function () {
        Route::get('/', [OrderController::class, 'createView'])->name('create-order');
        Route::post('/', [OrderController::class, 'create']);
    });
    Route::get('/list', [OrderController::class, 'listView'])->name('list-order');
    Route::get('{id}', [OrderController::class, 'detailView'])->name('detail-order');
    Route::get('{id}/approve', [OrderController::class, 'approve'])->name('approve-order');
    Route::get('{id}/reject', [OrderController::class, 'reject'])->name('reject-order');
    Route::get('{id}/return', [OrderController::class, 'return'])->name('return-order');
});
