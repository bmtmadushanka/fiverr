<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 /** Application Module Begin */
    Route::get('/applications', [App\Http\Controllers\ApplicationsController::class, 'index'])->name('applications');
    Route::get('/application-create', [App\Http\Controllers\ApplicationsController::class, 'create'])->name('application.create');
    Route::post('/application-store', [App\Http\Controllers\ApplicationsController::class, 'store'])->name('application.store');
    Route::get('/application-edit', [App\Http\Controllers\ApplicationsController::class, 'edit'])->name('application.edit');
    Route::post('/application-delete', [App\Http\Controllers\ApplicationsController::class, 'delete'])->name('application.delete');

/** Application Module Ends */

/** Users Module Begin */

    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
    Route::get('/user-create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
    Route::post('/user-store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');
    Route::get('/user-edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');
    Route::post('/user-delete', [App\Http\Controllers\UsersController::class, 'delete'])->name('user.delete');

/** Users Module Ends */


/** Users Module Begin */

Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
Route::get('/roles-create', [App\Http\Controllers\RolesController::class, 'create'])->name('role.create');
Route::post('/roles-store', [App\Http\Controllers\RolesController::class, 'store'])->name('role.store');
Route::get('/roles-edit/{$id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('role.edit');
Route::get('/roles-update/{$id}', [App\Http\Controllers\RolesController::class, 'update'])->name('role.update');
Route::post('/roles-delete', [App\Http\Controllers\RolesController::class, 'delete'])->name('role.delete');

/** Users Module Ends */