<?php

use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::get('/', 'index')->name('user.index');
        Route::get('/create', 'create')->name('user.create');
        Route::post('/store', 'store')->name('user.store');
        Route::get('/{user:slug}', 'show')->name('user.show');
        Route::get('/{user:slug}/edit', 'edit')->name('user.edit');
        Route::put('/{user:slug}/update', 'update')->name('user.update');
        Route::put('/{user:slug}/reset', 'resetPassword')->name('user.reset.password');
        Route::delete('/{user:slug}/destroy', 'destroy')->name('user.delete');
    });

    Route::controller(UserProfileController::class)->prefix('profile')->group(function(){
        Route::get('/', 'index')->name('profile.index');
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::put('/{user:slug}/update', 'update')->name('profile.update');
        Route::put('/{user:slug}/update-soscial-media', 'updateSocialMedia')->name('profile.update.social');
        Route::put('/{user:slug}/change-password', 'changePassword')->name('profile.change.password');
    });

    Route::controller(RoleController::class)->prefix('roles')->group(function(){
        Route::get('/', 'index')->name('roles.index');
        Route::post('/store', 'store')->name('roles.store');
        Route::delete('/{id}/delete', 'destroy')->name('roles.delete');
    });

    Route::controller(PermissionController::class)->prefix('permissions')->group(function(){
        Route::get('/', 'index')->name('permissions.index');
        Route::post('/', 'create')->name('permissions.create');
        // Route::post('/create', 'store')->name('permissions.create');
        Route::post('/store', 'store')->name('permissions.store');
    });
});

require __DIR__.'/auth.php';
