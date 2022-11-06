<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Account\UserController as AccountUserController;
use App\Http\Controllers\Account\ProfileController as AccountProfileController;
use App\Http\Controllers\Account\SkillController as AccountSkillController;
use App\Http\Controllers\Account\TagController as AccountTagController;
use App\Http\Controllers\Account\CharacteristicController as AccountCharacteristicController;

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\RelationController as AdminRelationController;
use App\Http\Controllers\Admin\CharacteristicController as AdminCharacteristicController;
use App\Http\Controllers\Admin\ModeratingController as AdminModeratingController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;

use App\Http\Controllers\InfoController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TrainerReviewController;

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

Route::get('/', InfoController::class)
    ->name('info');

// Account routes
Route::middleware('auth')->group(function () {
    Route::get('/account', AccountIndexController::class)
        ->name('account');
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::resource('users', AccountUserController::class);
        Route::resource('profiles', AccountProfileController::class);
        Route::resource('skills', AccountSkillController::class);
        Route::resource('tags', AccountTagController::class);
        Route::resource('characteristics', AccountCharacteristicController::class);
    });
});

require __DIR__ . '/auth.php';
//Front routes
Route::get('/trainers/{tag_id}/{city_id}', [TrainerController::class, 'index'])
    ->where('tag_id', '\d+')
    ->where('city_id', '\d+')
    ->name('trainers.index');
Route::get('/trainer/{id}/{city_id}', [TrainerController::class, 'show'])
    ->where('id', '\d+')
    ->where('city_id', '\d+')
    ->name('trainers.show');
Route::get('/review/{review_id}/{client_id}/{trainer_id}/{city_id}', [TrainerController::class, 'review'])
    ->where('review_id', '\d+')
    ->where('client_id', '\d+')
    ->where('trainer_id', '\d+')
    ->where('city_id', '\d+')
    ->name('trainers.review');
Route::resource('subscriptions', SubscriptionController::class);
Route::resource('trainerReviews', TrainerReviewController::class);

//Admin routes
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::get('/', AdminIndexController::class)
            ->name('index');
        Route::resource('profiles', AdminProfileController::class);
        Route::resource('skills', AdminSkillController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('tags', AdminTagController::class);
        Route::resource('relations', AdminRelationController::class)->parameters(['relations' => 'trainer']);
        Route::resource('characteristics', AdminCharacteristicController::class);
        Route::resource('moderatings', AdminModeratingController::class);
        Route::resource('roles', AdminRoleController::class);
    });
});
