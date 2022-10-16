<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\RelationController as AdminRelationController;

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
    return view('info');
});

Route::get('/account', AccountIndexController::class)
    ->name('account');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/trainers', [PageController::class, 'index'])
    ->name('trainers.index');
Route::get('/trainers/{id}', [PageController::class, 'show'])
    ->where('id', '\d+')
    ->name('trainers.show');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::get('/', AdminIndexController::class)
            ->name('index');
        Route::resource('profiles', AdminProfileController::class);
        Route::resource('skills', AdminSkillController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('tags', AdminTagController::class);
        Route::resource('relations', AdminRelationController::class);
    });
});
