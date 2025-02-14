<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\TeacherDashboardController;
use App\Http\Controllers\Admin\StudentDashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthController;

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
    return view('auth/login');
});

require __DIR__ . '/auth.php';

// Dashboard and Logout routes
Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.index');
    Route::get('student/dashboard', [StudentDashboardController::class, 'index'])->name('student.index');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/home', [AuthenticatedSessionController::class, 'home'])->name('home');
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {

    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::get('/library/delete/{library}', [LibraryController::class, 'destroy'])->name('library.destroy');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:teacher|student|admin']], function () {

    Route::resource('library', LibraryController::class)->except('destroy');
    Route::get('/library/delete/{library}', [LibraryController::class, 'destroy'])->name('library.destroy');
});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
