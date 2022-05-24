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



Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** Application Module Begin */
Route::get('/applications', [App\Http\Controllers\ApplicationsController::class, 'index'])->name('applications');
Route::get('/application-create', [App\Http\Controllers\ApplicationsController::class, 'create'])->name('application.create');
Route::post('/application-store', [App\Http\Controllers\ApplicationsController::class, 'store'])->name('application.store');
Route::get('/application-edit', [App\Http\Controllers\ApplicationsController::class, 'edit'])->name('application.edit');
Route::post('/application-update', [App\Http\Controllers\ApplicationsController::class, 'update'])->name('application.update');
Route::post('/application-delete', [App\Http\Controllers\ApplicationsController::class, 'delete'])->name('application.delete');
Route::post('/application-history', [App\Http\Controllers\ApplicationsController::class, 'history'])->name('application.history');

/** Application Module Ends */

/** Field Control Module Begin */
Route::get('/field-control', [\App\Http\Controllers\Admin\FieldControlController::class, 'create'])->name('field-control.create');

//CSC Educations
Route::get('/csc-educations', [App\Http\Controllers\Admin\EducationsController::class, 'index'])->name('csc-education.all');
Route::post('/csc-educations', [App\Http\Controllers\Admin\EducationsController::class, 'store'])->name('csc-education.store');
Route::post('/csc-educations/import', [App\Http\Controllers\Admin\EducationsController::class, 'import'])->name('csc-education.import');
Route::put('/csc-educations/{id}', [App\Http\Controllers\Admin\EducationsController::class, 'update'])->name('csc-education.update');
Route::delete('/csc-educations/{id}', [App\Http\Controllers\Admin\EducationsController::class, 'destroy'])->name('csc-education.destroy');


//Educations
Route::get('/educations', [App\Http\Controllers\Admin\NonCSCEducationController::class, 'index'])->name('education.all');
Route::post('/educations', [App\Http\Controllers\Admin\NonCSCEducationController::class, 'store'])->name('education.store');
Route::post('/educations/import', [App\Http\Controllers\Admin\NonCSCEducationController::class, 'import'])->name('education.import');
Route::put('/educations/{id}', [App\Http\Controllers\Admin\NonCSCEducationController::class, 'update'])->name('education.update');
Route::delete('/educations/{id}', [App\Http\Controllers\Admin\NonCSCEducationController::class, 'destroy'])->name('education.destroy');

//Notes
Route::get('/notes', [App\Http\Controllers\Admin\NotesController::class, 'index'])->name('note.all');
Route::post('/notes', [App\Http\Controllers\Admin\NotesController::class, 'store'])->name('note.store');
Route::post('/notes/import', [App\Http\Controllers\Admin\NotesController::class, 'import'])->name('note.import');
Route::put('/notes/{id}', [App\Http\Controllers\Admin\NotesController::class, 'update'])->name('note.update');
Route::delete('/notes/{id}', [App\Http\Controllers\Admin\NotesController::class, 'destroy'])->name('note.destroy');

//Sectors
Route::get('/sectors', [App\Http\Controllers\Admin\SectorsController::class, 'index'])->name('sector.all');
Route::post('/sectors', [App\Http\Controllers\Admin\SectorsController::class, 'store'])->name('sector.store');
Route::post('/sectors/import', [App\Http\Controllers\Admin\SectorsController::class, 'import'])->name('sector.import');
Route::put('/sectors/{id}', [App\Http\Controllers\Admin\SectorsController::class, 'update'])->name('sector.update');
Route::delete('/sectors/{id}', [App\Http\Controllers\Admin\SectorsController::class, 'destroy'])->name('sector.destroy');
Route::post('/sectors/from_department', [App\Http\Controllers\Admin\SectorsController::class, 'from_department'])->name('sector.from_department');

//Departments
Route::get('/departments', [App\Http\Controllers\Admin\DepartmentsController::class, 'index'])->name('department.all');
Route::post('/departments', [App\Http\Controllers\Admin\DepartmentsController::class, 'store'])->name('department.store');
Route::post('/departments/import', [App\Http\Controllers\Admin\DepartmentsController::class, 'import'])->name('department.import');
Route::put('/departments/{id}', [App\Http\Controllers\Admin\DepartmentsController::class, 'update'])->name('department.update');
Route::delete('/departments/{id}', [App\Http\Controllers\Admin\DepartmentsController::class, 'destroy'])->name('department.destroy');




/** Application Module Ends */

/** Users Module Begin */

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/user-create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::post('/user-store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');
Route::get('/user-edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');
Route::post('/user-update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('user.update');
Route::post('/user-delete', [App\Http\Controllers\UsersController::class, 'delete'])->name('user.delete');

/** Users Module Ends */


/** Users Module Begin */

Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
Route::get('/roles-create', [App\Http\Controllers\RolesController::class, 'create'])->name('role.create');
Route::post('/roles-store', [App\Http\Controllers\RolesController::class, 'store'])->name('role.store');
Route::get('/roles-edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('role.edit');
Route::post('/roles-update/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('role.update');
Route::post('/roles-delete/{id}', [App\Http\Controllers\RolesController::class, 'delete'])->name('role.delete');
Route::post('/roles-permission', [App\Http\Controllers\RolesController::class, 'permission'])->name('role.permission');

/** Users Module Ends */
