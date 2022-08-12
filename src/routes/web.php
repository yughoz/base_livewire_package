<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/init', Template\Adminrole\Http\Controllers\UserManagement\RoleAndPermissionController::class, 'anyDataPermission'])->name('permissions.datatable');
Route::get('/init',[Template\Adminrole\Http\Controllers\InitController::class, 'index'])->name('init');
Route::get('/init/start',[Template\Adminrole\Http\Controllers\InitController::class, 'start'])->name('init.start');

Route::middleware(['web', 'auth'])->group(function () {
    // Route::get('/', [Template\Adminrole\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users', function () {
        // dd(Auth()->user()->with('roles')->get());
        return view('adminlte::users');
    })->name('users');

    Route::get('/roles', function () {
        return view('adminlte::roles');
    })->name('roles');

    Route::get('/settings', function () {
        return view('adminlte::settings');
    })->name('settings');

    Route::get('/companies', function () {
        return view('adminlte::companies_temp');
    })->name('companies');

    Route::group(['prefix' => 'permission','middleware' => ['auth']], function () {
        Route::get('/', function () {
            return view('adminlte::permissions');
        })->name('permissions');
        Route::get('/datatable',[Template\Adminrole\Http\Controllers\UserManagement\RoleAndPermissionController::class, 'anyDataPermission'])->name('permissions.datatable');
        Route::get('/select2', [Template\Adminrole\Http\Controllers\UserManagement\RoleAndPermissionController::class, 'getPermission'])->name('list.permission');
        Route::get('/role/datatable', [Template\Adminrole\Http\Controllers\UserManagement\RoleAndPermissionController::class, 'getPermissionByRole'])->name('list.permissions-by-role');
        Route::post('/role', [Template\Adminrole\Http\Controllers\UserManagement\RoleAndPermissionController::class, 'givePermissionToRole'])->name('store.permission-role');
        Route::put('/revoke/{id}', [Template\Adminrole\Http\Controllers\UserManagement\RoleAndPermissionController::class, 'revokePermissionFromRole'])->name('revoke.permission');
    });

    Route::get('/profile', [Template\Adminrole\Http\Controllers\ProfileController::class, 'index'])->name('profile');

});