<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::prefix('user')->group(function () {
    //Auth routes
    Route::post('login', [AuthController::class, 'login'])->name('user.login');
    Route::get('login', [AuthController::class, 'showUserLogin'])->name('show.user.login');
    Route::post('login', [AuthController::class, 'login'])->name('user.login');
    Route::post('register', [AuthController::class, 'store'])->name('user.register');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('register', [UserController::class, 'create'])->name('show.user.register');
});


Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isStudent'])->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('home', [ReportController::class, 'index'])->name('student.index');
        Route::get('report', [ReportController::class, 'create'])->name('create.report');
        Route::post('report', [ReportController::class, 'store'])->name('store.report');
        Route::post('update-report/{id}', [ReportController::class, 'update'])->name('update.report');
    });
});

//Download report

//Supervisors Routes
Route::middleware(['auth', 'isSupervisor'])->prefix('supervisor')->group(function () {
    Route::get('home', [SupervisorController::class, 'index'])->name('supervisor.index');
    Route::get('profile', [SupervisorController::class, 'profile'])->name('supervisor.profile');
    Route::get('verify/{id}', [SupervisorController::class, 'verify'])->name('student.verify');
    Route::get('show-report/{id}', [ReportController::class, 'show'])->name('show.report');
});


//Coordinators Rouetes
Route::middleware(['auth', 'isCoordinator'])->prefix('coordinator')->group(function () {
    Route::get('home', [CoordinatorController::class, 'index'])->name('coordinator.index');
    Route::post('store', [CoordinatorController::class, 'store'])->name('store.supervisor');
    Route::get('show-update/{id}', [CoordinatorController::class, 'showUpdate'])->name('show.update.supervisor');
    Route::post('update', [CoordinatorController::class, 'updateSupervisor'])->name('update.supervisor');
    Route::get('profile', [CoordinatorController::class, 'profile'])->name('coordinator.profile');
});



//Routes for all authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/download-report/{id}', [ReportController::class, 'downloadReport']);
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/delete-user/{id}', [UserController::class, 'destroy']);
});
