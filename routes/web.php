<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\DeskController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UnitController;
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

    Route::post('/changer-password', [AuthController::class, 'changePassword'])->name('auth.password.change');
});

Route::prefix('kibide/company')->group(function () {
    Route::get('/create', [AuthController::class, 'create'])->name('company.create');
    Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/index', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/profile', [CompanyController::class, 'profile'])->name('company.admin.profile');

    Route::get('/list/users', [CompanyController::class, 'listUsers'])->name('company.list.users');
    Route::get('/create/users', [CompanyController::class, 'createUsers'])->name('company.create.users');
    Route::get('/create/units', [CompanyController::class, 'createUnits'])->name('company.create.units');
    Route::get('/list/units', [CompanyController::class, 'listUnits'])->name('company.list.units');
    Route::get('/create/sms', [CompanyController::class, 'createSms'])->name('company.create.sms');
    Route::get('/sms/inbox', [CompanyController::class, 'smsInbox'])->name('company.sms.Inbox');
    Route::get('/sms/sent', [CompanyController::class, 'smsSent'])->name('company.sms.sent');
    Route::get('/notification/inbox', [CompanyController::class, 'notificationInbox'])->name('company.notification.inbox');
    Route::get('/notification/histories', [CompanyController::class, 'notificationHistories'])->name('company.notification.histories');
    Route::get('/settings/index', [CompanyController::class, 'settings'])->name('company.settings.index');
    Route::get('/licence/index', [CompanyController::class, 'licence'])->name('company.licence.index');

});

Route::prefix('kibide/desk')->group(function () {
    Route::get('/index', [DeskController::class, 'index'])->name('desk.index');

    Route::get('/user/profile', [DeskController::class, 'profile'])->name('desk.user.profile');
});


Route::prefix('kibide/unit')->group(function () {
    Route::get('/index', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/profile', [UnitController::class, 'profile'])->name('unit.manager.profile');
    Route::post('/store', [UnitController::class, 'store'])->name('units.store');
    Route::get('/create/desks', [UnitController::class, 'createDesks'])->name('unit.create.desks');
    Route::get('/list/desks', [UnitController::class, 'listDesks'])->name('unit.list.desks');
    Route::get('/create/sms', [UnitController::class, 'createSms'])->name('unit.create.sms');
    Route::get('/sms/inbox', [UnitController::class, 'smsInbox'])->name('unit.sms.inbox');
    Route::get('/sms/sent', [UnitController::class, 'smsSent'])->name('unit.sms.sent');
    Route::get('/notification/inbox', [UnitController::class, 'notificationInbox'])->name('unit.notification.inbox');
    Route::get('/notification/histories', [UnitController::class, 'notificationHistories'])->name('unit.notification.histories');
    Route::get('/tickets/generated', [UnitController::class, 'ticketGenerated'])->name('unit.tickets.generated');
    Route::get('/tickets/settings', [UnitController::class, 'ticketSettings'])->name('unit.tickets.settings');
    Route::get('/settings/index', [UnitController::class, 'settingsIndex'])->name('unit.settings.index');
    Route::get('/settings/display', [UnitController::class, 'settingsDisplay'])->name('unit.settings.display');

    Route::get('/departaments/create', [UnitController::class, 'createDepartaments'])->name('unit.departaments.create');
    Route::get('/departaments/list', [UnitController::class, 'listDepartaments'])->name('unit.departaments.list');

    Route::get('/services/create', [UnitController::class, 'createServices'])->name('unit.services.create');
    Route::get('/services/list', [UnitController::class, 'listServices'])->name('unit.services.list');

    Route::get('/attendance-lines/create', [UnitController::class, 'createAttendanceLines'])->name('unit.attendance-lines.create');
    Route::get('/attendance-lines/list', [UnitController::class, 'listAttendanceLines'])->name('unit.attendance-lines.list');

    Route::get('/painel/show', [UnitController::class, 'showPainel'])->name('unit.painel.show');
    Route::get('/painel/settings', [UnitController::class, 'painelSettings'])->name('unit.painel.settings');

    Route::post('/services/store', [ServiceController::class, 'store'])->name('unit.store.service');
    Route::post('/counters/store', [CounterController::class, 'store'])->name('units.counter.store');

    // unit.store.operation
    Route::post('/operations/store', [OperationController::class, 'store'])->name('unit.store.operation');

    Route::get('/operations/create', [UnitController::class, 'createOperation'])->name('unit.create.operation');
    Route::get('/operations/list', [UnitController::class, 'listOperation'])->name('unit.list.operation');
    Route::get('/operations/settings', [UnitController::class, 'operationSettings'])->name('unit.settings.operation');
});

Route::prefix('kibide/users')->group(function () {
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/store/desk', [UserController::class, 'storedesks'])->name('users.desk.store');
});
