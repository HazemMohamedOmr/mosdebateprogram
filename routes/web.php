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

Route::get('/teamRegistration', function () {
    return view('teamRegistration');
});

Route::get('/success', function () {
    return view('success');
})->name('success');

Route::get('visitor-invitation', [InvitationController::class, 'index'])->name('visitor-invitation-form');

Route::post('visitor-invitation', [InvitationController::class, 'store'])->name('visitor-invitation-submit');

Route::post('teamRegistration/form-student', [StudentController::class, 'store'])->name('form.student');



//TODO 2 or 1 routes for displaying info
