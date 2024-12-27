<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

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

Route::get('/foo', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('visitor')->group(function () {
    Route::get('/', [InvitationController::class, 'index'])->name('visitor-invitation-form');

    Route::post('/', [InvitationController::class, 'store'])->name('visitor-invitation-submit');

    Route::get('/success', [InvitationController::class, 'success'])->name('visitor-invitation-success');

    Route::get('/qrcode/{uuid}', [InvitationController::class, 'qrcode'])->name('visitor-invitation-qrcode');
});


Route::prefix('register')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('team-invitation-form');

    Route::post('/', [StudentController::class, 'store'])->name('team-invitation-submit');

    Route::get('/success', [StudentController::class, 'success'])->name('team-invitation-success');
});


Route::get('visitor-info/{uuid}', [InvitationController::class, 'show'])->name('visitor-invitation-show');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::post('/toggle-form/{formType}', [AdminController::class, 'toggleForm'])->name('admin.toggleForm');

    Route::get('visitors', function () { // TODO refactoring
        return view('admin.visitors');
    })->name('admin-visitors-show');

    Route::get('register', function () { // TODO refactoring
        return view('admin.register');
    })->name('admin-register-show');

    Route::get('login', function () { // TODO refactoring
        return view('admin.login');
    })->name('login');

});

