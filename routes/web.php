<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Account\UserController as AccountUserController;
use App\Http\Controllers\Account\ProfileController as AccountProfileController;
use App\Http\Controllers\Account\SkillController as AccountSkillController;
use App\Http\Controllers\Account\TagController as AccountTagController;
use App\Http\Controllers\Account\CharacteristicController as AccountCharacteristicController;
use App\Http\Controllers\Account\GymController as AccountGymController;
use \App\Http\Controllers\Account\GymAddressController as AccountGymAddressController;
use App\Http\Controllers\Account\ModeratingController as AccountModeratingController;
use App\Http\Controllers\Account\ReviewsController as AccountReviewsController;

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ChangePasswordController as AdminChangePasswordController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\RelationController as AdminRelationController;
use App\Http\Controllers\Admin\CharacteristicController as AdminCharacteristicController;
use App\Http\Controllers\Admin\ModeratingController as AdminModeratingController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\GymController as AdminGymController;
use App\Http\Controllers\Admin\GymAddressController as AdminGymAddressController;
use App\Http\Controllers\Admin\GymImageController as AdminGymImageController;

use App\Http\Controllers\GymController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MailSendController;
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
        Route::resource('gyms', AccountGymController::class);
        Route::resource('gym_addresses', AccountGymAddressController::class);
        Route::get('moderating', AccountModeratingController::class)
            ->name('moderating');
        Route::get('reviews/trainers', [AccountReviewsController::class, 'showTrainerReviews'])
            ->name('reviews.trainers');
    });
});

require __DIR__ . '/auth.php';

//Front routes trainers
Route::get('/trainers/{tag_id}/{city_id}', [TrainerController::class, 'index'])
    ->where('tag_id', '\d+')
    ->where('city_id', '\d+')
    ->name('trainers.index');
Route::get('/trainer/{id}/{city_id}', [TrainerController::class, 'show'])
    ->where('id', '\d+')
    ->where('city_id', '\d+')
    ->name('trainers.show');
Route::get('/trainer/review/{review_id}/{client_id}/{trainer_id}/{city_id}', [TrainerController::class, 'review'])
    ->where('review_id', '\d+')
    ->where('client_id', '\d+')
    ->where('trainer_id', '\d+')
    ->where('city_id', '\d+')
    ->name('trainers.review');
//Front routes gyms
Route::get('/gyms/{city_id}', [GymController::class, 'index'])
    ->where('city_id', '\d+')
    ->name('gyms.index');
Route::get('/gym/{id}/{city_id}', [GymController::class, 'show'])
    ->where('id', '\d+')
    ->where('city_id', '\d+')
    ->name('gyms.show');

Route::resource('subscriptions', SubscriptionController::class);

Route::group(['middleware' => ['auth', 'is_activated']], function () {
    Route::resource('trainerReviews', TrainerReviewController::class);
});

//Admin routes
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::get('/', AdminIndexController::class)
            ->name('index');

        Route::get('/changepassword', AdminChangePasswordController::class)
            ->name('changePassword');
        Route::post('/updatepassword', [AdminChangePasswordController::class, 'updatePassword'])
            ->name('updatePassword');

        Route::resource('profiles', AdminProfileController::class);
        Route::resource('skills', AdminSkillController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('tags', AdminTagController::class);
        Route::resource('relations', AdminRelationController::class)->parameters(['relations' => 'trainer']);
        Route::resource('characteristics', AdminCharacteristicController::class);
        Route::resource('moderatings', AdminModeratingController::class);
        Route::resource('roles', AdminRoleController::class);
        Route::resource('gyms', AdminGymController::class);
        Route::resource('gymAddresses', AdminGymAddressController::class);
        Route::resource('gymImages', AdminGymImageController::class);
        Route::get('/send', [MailSendController::class, 'index'])->name('send.index');
        Route::post('/send', [MailSendController::class, 'send'])->name('send.send');
    });
});
