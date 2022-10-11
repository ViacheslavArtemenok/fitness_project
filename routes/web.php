<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', AdminController::class)
        ->name('index');

    Route::resource('users', AdminUserController::class);
    Route::resource('profiles', AdminProfileController::class);
    Route::resource('skills', AdminSkillController::class);
});



Route::get('/', function () {
    return view('welcome');
});
Route::get('/vue', VueController::class)
->name('vue.index');