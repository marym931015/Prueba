<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\MembershipController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\VersionController;
use App\Http\Controllers\Api\PublicationController;
use App\Http\Controllers\Api\ComercialRoleController;
use App\Http\Controllers\Api\CallController;
use App\Http\Controllers\Api\AgoraController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});



Route::prefix('v1.0.0')->group(function () {
  Route::get('users/{user}', [GroupController::class, 'getUser']);
  Route::post('signup', [AuthController::class, 'signUp']);
  Route::post('signin', [AuthController::class, 'signIn']);
  // Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->middleware(['guest'])->name('password.email');
  Route::get('categories', [CategoryController::class, 'index']);
  Route::get('categories/{category}/products', [CategoryController::class, 'products']);
  Route::get('categories/{category}/groups', [CategoryController::class, 'groups']);
  Route::get('groups/{team}', [GroupController::class, 'get']);
  Route::get('products', [ProductController::class, 'index']);
  Route::get('countries', [CountryController::class, 'index']);
  Route::get('countries/{country}/states', [CountryController::class, 'indexStates']);
  Route::get('memberships', [MembershipController::class, 'index']);
  Route::get('comercial-roles', [ComercialRoleController::class, 'index']);
  Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('logout', [AuthController::class, 'logOut']);
    Route::get('profile', [ProfileController::class, 'get']);
    Route::post('profile', [ProfileController::class, 'update']);
    Route::post('profile/phone-verified', [ProfileController::class, 'phoneNumberVerified']);
    Route::get('profile/permissions', [ProfileController::class, 'permissions']);
    Route::post('profile/upload-photo', [ProfileController::class, 'uploadPhoto']);
    Route::get('profile/notifications', [ProfileController::class, 'getUserNotifications']);
    Route::post('profile/{id}/notifications', [ProfileController::class, 'notificationsDelete']);
    Route::post('profile/notifications/as-read', [ProfileController::class, 'markNotificationAsRead']);
    Route::get('profile', [ProfileController::class, 'get']);

    Route::get('groups', [GroupController::class, 'index']);
    Route::get('groups-rooms', [GroupController::class, 'indexRoom']);
    Route::get('groups-privates', [GroupController::class, 'indexPrivates']);
    Route::post('groups-privates/friend-request/{team}', [GroupController::class, 'friendRequest']);
    Route::post('groups-privates/cancel-request/{team}', [GroupController::class, 'cancelRequest']);
    Route::get('groups-privates/friend-request', [GroupController::class, 'indexFriendRequest']);
    Route::post('groups', [GroupController::class, 'store']);
    Route::put('groups/{team}', [GroupController::class, 'update']);
    Route::post('groups/{team}/upload-photo', [GroupController::class, 'uploadPhoto']);
    Route::post('groups/{team}/join', [GroupController::class, 'join']);
    Route::post('groups/{team}/leave', [GroupController::class, 'leave']);
    Route::post('groups/{team}/exit', [GroupController::class, 'leave']);
    Route::post('/groups/switch-group', [GroupController::class, 'groupChange']);
    Route::get('/groups/switch-group-send', [GroupController::class, 'changeGroupSent']);
    Route::get('/groups/switch-group-received', [GroupController::class, 'changeGroupReceived']);
    Route::post('/groups/switch-group-cancel', [GroupController::class, 'cancelChangeGroupSent']);
    Route::post('/groups/switch-group-reject', [GroupController::class, 'rejectChangeGroupReceived']);
    Route::get('/groups_special', [SpecialGroupController::class, 'index']);
    Route::get('/groups_special/{id}', [SpecialGroupController::class, 'get']);
    Route::post('groups_special/{id}/join', [GroupController::class, 'join']);
    Route::post('groups_special/{id}/leave', [GroupController::class, 'leave']);
    Route::post('groups_special/{id}/exit', [GroupController::class, 'leave']);
    Route::get('messages/group/{team}', [MessageController::class, 'index']);
    Route::get('messages/privates/{team}', [MessageController::class, 'indexPrivate']);
    Route::post('messages/group/{team}/text', [MessageController::class, 'storeText']);
    Route::post('messages/group/{team}/upload-image', [MessageController::class, 'putImage']);
    // Route::get('/messages/{message}/binary', [MessageController::class, 'getBinaryData']);
    Route::get('feedback', [FeedbackController::class, 'index']);
    Route::post('/feedback', [FeedbackController::class, 'store']);
    Route::get('settings', [SettingController::class, 'index']);
    Route::get('versions', [VersionController::class, 'index']);
    Route::get('publications', [PublicationController::class, 'index']);
    Route::get('publications/group/{team}', [PublicationController::class, 'indexTeam']);
    Route::post('publications', [PublicationController::class, 'store']);
    Route::post('publications/{publication}/upload-photo', [PublicationController::class, 'uploadPhoto']);
    Route::post('publications/{publication}/delete-photo', [PublicationController::class, 'deletePhoto']);
    Route::post('publications/{publication}', [PublicationController::class, 'update']);
    Route::post('publications/{publication}/delete', [PublicationController::class, 'destroy']);
    Route::get('publications/{publication}', [PublicationController::class, 'show']);
    Route::post('/publications/{publication}/owner-message/text', [PublicationController::class, 'sendMessageOwner']);
    Route::get('user-publications', [PublicationController::class, 'list']);
    Route::post('publications/{publication}/notify-seller', [PublicationController::class, 'notifySeller']);
    Route::post('/messages/group/{team}/page', [MessageController::class, 'savePage']);
    Route::get('/messages/group/{team}/page', [MessageController::class, 'getPage']);
    Route::post('/call-histories/group/{team}', [CallController::class, 'store']);
    Route::get('/call-histories', [CallController::class, 'index']);
    Route::post('/call-histories/finished-call', [CallController::class, 'update']);
    Route::post('/call-histories/clear', [CallController::class, 'destroy']);
    Route::post('/call-histories/{id}/clear', [CallController::class, 'deleteCall']);
    Route::get('/call/status', [CallController::class, 'getCallStatus']);
    Route::post('/call/status', [CallController::class, 'setCallStatus']);
    Route::get('/call-team/{team}/status', [CallController::class, 'getCallTeamStatus']);

    Route::post('/agora-sdk/generate-rtm-token', [AgoraController::class, 'generateRtmToken']);
    Route::post('/agora-sdk/generate-rtc-token-with-uid', [AgoraController::class, 'generateRtmTokenWithUid']);
    Route::post('/agora-sdk/generate-rtc-token-with-user-account', [AgoraController::class, 'generateRtmTokenWithUserAccount']);

  });


    Route::get('timezone', [SettingController::class, 'getTimezone']);
});
