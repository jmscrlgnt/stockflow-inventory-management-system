<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Entry / Login Selection
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login-choice');
})->name('login');


/*
|--------------------------------------------------------------------------
| Administrator Authentication
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [
    AuthController::class,
    'showAdminLogin'
])->name('admin.login');

Route::post('/admin/login', [
    AuthController::class,
    'adminLogin'
])->name('admin.login.submit');


/*
|--------------------------------------------------------------------------
| Staff Authentication
|--------------------------------------------------------------------------
*/

Route::get('/staff/login', [
    AuthController::class,
    'showStaffLogin'
])->name('staff.login');

Route::post('/staff/login', [
    AuthController::class,
    'staffLogin'
])->name('staff.login.submit');


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [
    AuthController::class,
    'logout'
])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Protected Inventory Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin,staff'
])->group(function () {

    Route::resource('items', ItemController::class);

});