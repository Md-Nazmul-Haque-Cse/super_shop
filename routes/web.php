<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OutletController;
use App\Http\Controllers\Front\FrontController;
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

Route::get('/',[FrontController::class, 'index'])->name('/');

//Route::get('/', function () {
//    return view('welcome');
//});

// Add User Route //
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/add-user',[CustomerController::class, 'addUser'])->name('add-user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/new-user',[CustomerController::class, 'newUser'])->name('new-user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/manage-user',[CustomerController::class, 'manageUser'])->name('manage-user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/edit-user/{id}',[CustomerController::class, 'editUser'])->name('edit-user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/update-user/{id}',[CustomerController::class, 'updateUser'])->name('update-user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/delete-user/{id}',[CustomerController::class, 'deleteUser'])->name('delete-user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);

// Add outlet Route //
Route::get('/add-outlet',[OutletController::class, 'addOutlet'])->name('add-outlet')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/new-outlet',[OutletController::class, 'newOutlet'])->name('new-outlet')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/manage-outlet',[OutletController::class, 'manageOutlet'])->name('manage-outlet')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/edit-outlet/{id}',[OutletController::class, 'editOutlet'])->name('edit-outlet')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/update-outlet/{id}',[OutletController::class, 'updateOutlet'])->name('update-outlet')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::post('/delete-outlet/{id}',[OutletController::class, 'deleteOutlet'])->name('delete-outlet')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);



