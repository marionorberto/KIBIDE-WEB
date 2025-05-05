<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeskController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('kibide/auth/index');
});

Route::get('kibide/politics', function () {
    return view('politics');
})->name('politics');

Route::get('kibide/terms', function () {
    return view('terms');
})->name('terms');

Route::get('kibide/faq', function () {
    return view('faq');
})->name('faq');

Route::get('kibide/{id}/painel', function () {
    return view('painel');
})->name('painel');


Route::prefix('kibide/auth')->group(function () {

    Route::get('/index', [AuthController::class, 'index'])->name('auth.login.show');

    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('auth.forgot');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('kibide/company')->group(function () {
    Route::get('/create', [AuthController::class, 'create'])->name('company.create');
    Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/index', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/profile', [CompanyController::class, 'profile'])->name('company.admin.profile');
    Route::get('/list/users', [CompanyController::class, 'listUsers'])->name('company.list.users');
    Route::get('/create/users', [CompanyController::class, 'createUsers'])->name('company.create.users');
});

Route::prefix('kibide/desk')->group(function () {
    Route::get('/index', [DeskController::class, 'index'])->name('desk.index');

    Route::get('/user/profile', [DeskController::class, 'profile'])->name('desk.user.profile');
});


Route::prefix('kibide/unit')->group(function () {
});

Route::prefix('kibide/users')->group(function () {
});

