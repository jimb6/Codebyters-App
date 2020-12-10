<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AlumnusController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\PermissionController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('alumni', AlumnusController::class);
        Route::resource('occupations', OccupationController::class);
        Route::resource('positions', PositionController::class);
        Route::resource('addresses', AddressController::class);
        Route::resource('cities', CityController::class);
        Route::resource('officials', OfficialController::class);
        Route::resource('images', ImageController::class);
        Route::resource('students', StudentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('tags', TagController::class);
        Route::resource('activities', ActivityController::class);
        Route::resource('provinces', ProvinceController::class);
        Route::resource('institutes', InstituteController::class);
        Route::resource('programs', CourseController::class);
    });
