<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});


Route::get('/home', function () {
    return view('landing');
})->name('home');


Route::prefix('bukabem/auth')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');

    Route::get('/register-student', [AuthController::class, 'registerStudent'])->name('auth.register-student');

    Route::get('/register-mentor', [AuthController::class, 'registerMentor'])->name('auth.register-mentor');

    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('auth.forgot');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('bukabem/admin/dashboard')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/profile/index', [AdminController::class, 'profile'])->name('admin.dashboard.profile.index');
    Route::get('/students/index', [AdminController::class, 'students'])->name('admin.dashboard.students.index');
    Route::get('/mentors/index', [AdminController::class, 'mentors'])->name('admin.dashboard.mentors.index');
    Route::get('/settings/index', [AdminController::class, 'settings'])->name('admin.dashboard.settings.index');
});

// Route::prefix('bukabem/mentor')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });


// Route::prefix('bukabem/student')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });
