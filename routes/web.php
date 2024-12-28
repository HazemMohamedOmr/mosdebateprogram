<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\AdminVisitorController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\StudentController;
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

    Route::get('/qrcode/{uuid}', [StudentController::class, 'qrcode'])->name('team-invitation-qrcode');
});


Route::get('visitor-info/{uuid}', [InvitationController::class, 'show'])->name('visitor-invitation-show');
Route::get('student-info/{uuid}', [StudentController::class, 'show'])->name('student-invitation-show');

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');

    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::post('/toggle-form/{formType}', [AdminController::class, 'toggleForm'])->name('admin.toggleForm');

        Route::get('/visitors', [AdminVisitorController::class, 'index'])->name('admin.visitors');
        Route::get('/visitors/{id}', [AdminVisitorController::class, 'show'])->name('admin.visitors.show');

        Route::get('/register', [AdminTeamController::class, 'index'])->name('admin.register');
        Route::get('/register/{id}', [AdminTeamController::class, 'show'])->name('admin.register.show');
        Route::post('/invitation', [AdminTeamController::class, 'invitation'])->name('admin.send.invitation');

        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });

});

