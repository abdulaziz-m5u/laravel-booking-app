<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Route::get('', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['isAdmin','auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

    Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
    Route::delete('countries_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('countries.mass_destroy');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');
    Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
    Route::delete('rooms_mass_destroy', [\App\Http\Controllers\Admin\RoomController::class, 'massDestroy'])->name('rooms.mass_destroy');
    Route::resource('customers', \App\Http\Controllers\Admin\CustomerController::class);
    Route::delete('customers_mass_destroy', [\App\Http\Controllers\Admin\CustomerController::class, 'massDestroy'])->name('customers.mass_destroy');
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class);
    Route::delete('bookings_mass_destroy', [\App\Http\Controllers\Admin\BookingController::class, 'massDestroy'])->name('bookings.mass_destroy');

    Route::get('find_rooms', [\App\Http\Controllers\Admin\FindRoomController::class, 'index'])->name('find_rooms.index');
    Route::post('find_rooms', [\App\Http\Controllers\Admin\FindRoomController::class, 'index']);

    Route::get('system_calendars', [\App\Http\Controllers\Admin\SystemCalendarController::class, 'index'])->name('system_calendars.index');
});

Auth::routes();

