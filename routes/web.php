<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix('dashboard/')->middleware(['auth'])->group(function () {
    

    Route::controller(ProfileController::class)->prefix('profiles')->group(function(){
        Route::get('/', 'index')->name('profile.index');
        Route::get('/edit', 'edit')->name('profile.edit');
    });

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

});

require __DIR__.'/auth.php';
