<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});

Route::prefix('visitor-invitation')->group(function () {
    Route::get('/', [InvitationController::class, 'index'])->name('visitor-invitation-form');

    Route::post('/', [InvitationController::class, 'store'])->name('visitor-invitation-submit');

    Route::get('/success', [InvitationController::class, 'success'])->name('visitor-invitation-success');
});

Route::prefix('team-invitation')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('team-invitation-form');

    Route::post('/', [StudentController::class, 'store'])->name('team-invitation-submit');

    Route::get('/success', [StudentController::class, 'success'])->name('team-invitation-success');
});


//TODO 2 or 1 routes for displaying info
