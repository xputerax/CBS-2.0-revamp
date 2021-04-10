<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
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

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');


Route::prefix('appointment')->name('appointment.')->group(function () {
    Route::get('set', [AppointmentController::class, 'index'])->name('set');
    Route::get('sets/{user}', [AppointmentController::class, 'set'])->name('sets');
    Route::get('search', [AppointmentController::class, 'search'])->name('search');
    Route::get('queue', [AppointmentController::class, 'queue'])->name('queue'); 
    Route::get('records', [AppointmentController::class, 'records'])->name('records');  
});

Route::prefix('patient')->name('patient.')->group(function () {
    Route::get('add', [PatientController::class, 'index'])->name('index');
    Route::get('records', [PatientController::class, 'records'])->name('records');
    Route::post('add', [PatientController::class, 'savePatient'])->name('add');
});


