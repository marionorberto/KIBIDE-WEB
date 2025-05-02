<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});


Route::get('/home', function () {
    return view('landing');
})->name('home');


Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.index');


Route::prefix('bukabem/auth')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('auth.login');

    Route::get('/register-student', function () {
        return view('auth.register-student');
    })->name('auth.regis
    ter-student');

    Route::get('/register-mentor', function () {
        return view('auth.register-mentor');
    })->name('auth.register-mentor');

    Route::get('/forgot-password', function () {
        return view('auth.forgot');
    })->name('auth.forgot');
});


Route::prefix('bukabem/admin/dashboard')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('admin.dashboard.index');
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
