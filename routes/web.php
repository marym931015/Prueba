<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SpecialGroupController;

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



// Email
Auth::routes(['verify' => true]);
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::get('/forgot-password', function () {
//   return view('auth.forgot-password');
// })->middleware(['guest'])->name('password.request');
Route::get('/email/verified', [VerificationController::class, 'verified'])->name('verification.verified');

// Auth
Route::get('login', [LoginController::class, 'showLoginForm'])
  ->name('login')
  ->middleware('guest');

Route::post('login', [LoginController::class, 'login'])
  ->name('login.attempt')
  ->middleware('guest');

// Profile
Route::get('profile', [ProfileController::class, 'index'])
  ->name('profile')
  ->middleware('auth');

Route::put('/profile', [ProfileController::class, 'update'])
  ->name('profile.update')
  ->middleware('auth');

Route::put('profile/change-password', [ProfileController::class, 'updatePassword'])
  ->name('profile.change-password')
  ->middleware('auth');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])
  ->name('dashboard')
  ->middleware('auth');


// Users
Route::get('users', [UserController::class, 'index'])
  ->name('users')
  ->middleware('auth');

Route::get('users/create', [UserController::class, 'create'])
  ->name('users.create')
  ->middleware('auth');

Route::post('users', [UserController::class, 'store'])
  ->name('users.store')
  ->middleware('auth');

Route::get('users/{id}/edit', [UserController::class, 'edit'])
  ->name('users.edit')
  ->middleware('auth');

Route::put('users/{id}', [UserController::class, 'update'])
  ->name('users.update')
  ->middleware('auth');

Route::delete('users/{user}', [UserController::class, 'destroy'])
  ->name('users.destroy')
  ->middleware('auth');

Route::put('users/{id}/restore', [UserController::class, 'restore'])
  ->name('users.restore')
  ->middleware('auth');

// Countries
Route::get('countries', [CountryController::class, 'index'])
  ->name('countries')
  ->middleware('auth');

Route::get('countries/create', [CountryController::class, 'create'])
  ->name('countries.create')
  ->middleware('auth');

Route::post('countries', [CountryController::class, 'store'])
  ->name('countries.store')
  ->middleware('auth');

Route::get('countries/{id}/edit', [CountryController::class, 'edit'])
  ->name('countries.edit')
  ->middleware('auth');

Route::put('countries/{id}', [CountryController::class, 'update'])
  ->name('countries.update')
  ->middleware('auth');

Route::delete('countries/{country}', [CountryController::class, 'destroy'])
  ->name('countries.destroy')
  ->middleware('auth');

Route::put('countries/{id}/restore', [CountryController::class, 'restore'])
  ->name('countries.restore')
  ->middleware('auth');

Route::get('countries/{country}/state/create', [CountryController::class, 'createState'])
  ->name('countries.state.create')
  ->middleware('auth');

Route::post('countries/{country}/state', [CountryController::class, 'storeState'])
  ->name('countries.state.store')
  ->middleware('auth');

Route::get('countries/{country}/state/{id}/edit', [CountryController::class, 'editState'])
  ->name('countries.state.edit')
  ->middleware('auth');

Route::put('countries/{country}/state/{countryState}', [CountryController::class, 'updateState'])
  ->name('countries.state.update')
  ->middleware('auth');

Route::delete('countries/{country}/state/{countryState}', [CountryController::class, 'destroyState'])
  ->name('countries.state.destroy')
  ->middleware('auth');

Route::put('countries/{country}/state/{id}/restore', [CountryController::class, 'restoreState'])
  ->name('countries.state.restore')
  ->middleware('auth');

// Categories
Route::get('categories', [CategoryController::class, 'index'])
  ->name('categories')
  ->middleware('auth');

Route::get('categories/create', [CategoryController::class, 'create'])
  ->name('categories.create')
  ->middleware('auth');

Route::post('categories', [CategoryController::class, 'store'])
  ->name('categories.store')
  ->middleware('auth');

Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])
  ->name('categories.edit')
  ->middleware('auth');

Route::put('categories/{id}', [CategoryController::class, 'update'])
  ->name('categories.update')
  ->middleware('auth');

Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
  ->name('categories.destroy')
  ->middleware('auth');

Route::put('categories/{id}/restore', [CategoryController::class, 'restore'])
  ->name('categories.restore')
  ->middleware('auth');

// Products
Route::get('products', [ProductController::class, 'index'])
  ->name('products')
  ->middleware('auth');

Route::get('products/create', [ProductController::class, 'create'])
  ->name('products.create')
  ->middleware('auth');

Route::post('products', [ProductController::class, 'store'])
  ->name('products.store')
  ->middleware('auth');

Route::get('products/{id}/edit', [ProductController::class, 'edit'])
  ->name('products.edit')
  ->middleware('auth');

Route::put('products/{id}', [ProductController::class, 'update'])
  ->name('products.update')
  ->middleware('auth');

Route::delete('products/{product}', [ProductController::class, 'destroy'])
  ->name('products.destroy')
  ->middleware('auth');

Route::put('products/{id}/restore', [ProductController::class, 'restore'])
  ->name('products.restore')
  ->middleware('auth');

// Memberships
Route::get('memberships', [MembershipController::class, 'index'])
  ->name('memberships')
  ->middleware('auth');

Route::get('memberships/create', [MembershipController::class, 'create'])
  ->name('memberships.create')
  ->middleware('auth');

Route::post('memberships', [MembershipController::class, 'store'])
  ->name('memberships.store')
  ->middleware('auth');

Route::get('memberships/{id}/edit', [MembershipController::class, 'edit'])
  ->name('memberships.edit')
  ->middleware('auth');

Route::put('memberships/{id}', [MembershipController::class, 'update'])
  ->name('memberships.update')
  ->middleware('auth');

Route::delete('memberships/{membership}', [MembershipController::class, 'destroy'])
  ->name('memberships.destroy')
  ->middleware('auth');

Route::put('memberships/{id}/restore', [MembershipController::class, 'restore'])
  ->name('memberships.restore')
  ->middleware('auth');

// Clients
Route::get('clients', [ClientController::class, 'index'])
  ->name('clients')
  ->middleware('auth');

Route::get('clients/create', [ClientController::class, 'create'])
  ->name('clients.create')
  ->middleware('auth');

  Route::post('clients', [ClientController::class, 'store'])
    ->name('clients.store')
    ->middleware('auth');

Route::get('clients/{id}/edit', [ClientController::class, 'edit'])
  ->name('clients.edit')
  ->middleware('auth');

Route::put('clients/{id}', [ClientController::class, 'update'])
  ->name('clients.update')
  ->middleware('auth');

Route::delete('clients/{user}', [ClientController::class, 'destroy'])
  ->name('clients.destroy')
  ->middleware('auth');

Route::put('clients/{id}/restore', [ClientController::class, 'restore'])
  ->name('clients.restore')
  ->middleware('auth');

Route::get('clients/{user}/chat', [ClientController::class, 'chat'])
  ->name('clients.chat')
  ->middleware('auth');


// Groups
Route::get('groups', [GroupController::class, 'index'])
  ->name('groups')
  ->middleware('auth');

Route::get('groups/create', [GroupController::class, 'create'])
  ->name('groups.create')
  ->middleware('auth');

Route::post('groups', [GroupController::class, 'store'])
  ->name('groups.store')
  ->middleware('auth');

Route::get('groups/{id}/edit', [GroupController::class, 'edit'])
  ->name('groups.edit')
  ->middleware('auth');

Route::put('groups/{id}', [GroupController::class, 'update'])
  ->name('groups.update')
  ->middleware('auth');

Route::delete('groups/{team}', [GroupController::class, 'destroy'])
  ->name('groups.destroy')
  ->middleware('auth');

Route::put('groups/{id}/restore', [GroupController::class, 'restore'])
  ->name('groups.restore')
  ->middleware('auth');
Route::get('groups/{team}/members', [GroupController::class, 'members'])
  ->name('groups.members')
  ->middleware('auth');
Route::post('groups/{team}/members', [GroupController::class, 'storeMember'])
  ->name('groups.members.store')
  ->middleware('auth');
Route::post('groups/{team}/delete-members', [GroupController::class, 'deleteMember'])
  ->name('groups.members.delete')
  ->middleware('auth');
Route::get('groups/{team}/chat', [GroupController::class, 'chat'])
  ->name('groups.chat')
  ->middleware('auth');
Route::post('groups/{team}/store-message', [GroupController::class, 'storeMessage'])
->name('groups.message.store')
  ->middleware('auth');

  // Special Group
  Route::get('special_groups', [SpecialGroupController::class, 'index'])
    ->name('special_groups')
    ->middleware('auth');

  Route::get('special_groups/create', [SpecialGroupController::class, 'create'])
    ->name('special_groups.create')
    ->middleware('auth');

  Route::post('special_groups', [SpecialGroupController::class, 'store'])
    ->name('special_groups.store')
    ->middleware('auth');

  Route::get('special_groups/{id}/edit', [SpecialGroupController::class, 'edit'])
    ->name('special_groups.edit')
    ->middleware('auth');

  Route::put('special_groups/{id}', [SpecialGroupController::class, 'update'])
    ->name('special_groups.update')
    ->middleware('auth');

  Route::delete('special_groups/{team}', [SpecialGroupController::class, 'destroy'])
    ->name('special_groups.destroy')
    ->middleware('auth');

  Route::put('special_groups/{id}/restore', [SpecialGroupController::class, 'restore'])
    ->name('special_groups.restore')
    ->middleware('auth');
  Route::get('special_group/{team}/members', [SpecialGroupController::class, 'members'])
    ->name('special_groups.members')
    ->middleware('auth');
  Route::post('special_groups/{team}/members', [SpecialGroupController::class, 'storeMember'])
    ->name('special_groups.members.store')
    ->middleware('auth');
  Route::post('special_groups/{team}/delete-members', [SpecialGroupController::class, 'deleteMember'])
    ->name('special_groups.members.delete')
    ->middleware('auth');
    Route::post('special_groups/{team}/delete-number', [SpecialGroupController::class, 'deleteNumber'])
    ->name('special_groups.number.delete')
    ->middleware('auth');
  Route::get('special_groups/{team}/chat', [SpecialGroupController::class, 'chat'])
    ->name('special_groups.chat')
    ->middleware('auth');
  Route::post('special_groups/{team}/store-message', [SpecialGroupController::class, 'storeMessage'])
  ->name('special_groups.message.store')
    ->middleware('auth');
 Route::get('special_groups/{team}/new_member', [SpecialGroupController::class, 'newMember'])
    ->name('special_groups.new_member')
     ->middleware('auth');
 Route::post('special_groups/{team}/new_member', [SpecialGroupController::class, 'storeNewMember'])
     ->name('special_groups.new_member.store')
       ->middleware('auth');
Route::get('special_groups/{id}', [SpecialGroupController::class, 'generate_link'])
    ->name('special_groups.generate_link')
    ->middleware('auth');

// Feedback
Route::get('feedback', [FeedbackController::class, 'index']);
Route::post('feedback', [FeedbackController::class, 'store']);
// Settings
Route::get('settings', [SettingController::class, 'index'])
  ->name('settings')
  ->middleware('auth');
Route::put('settings', [SettingController::class, 'update'])
  ->name('settings.update')
  ->middleware('auth');
// Versions
Route::get('versions', [VersionController::class, 'index']);
Route::get('versions/create', [VersionController::class, 'create'])
  ->name('versions.create')
  ->middleware('auth');
Route::post('versions', [VersionController::class, 'store'])
  ->name('versions.store')
  ->middleware('auth');
Route::get('versions/{id}/edit', [VersionController::class, 'edit'])
  ->name('versions.edit')
  ->middleware('auth');
Route::put('versions/{id}', [VersionController::class, 'update'])
  ->name('versions.update')
  ->middleware('auth');
Route::delete('versions/{version}', [VersionController::class, 'destroy'])
  ->name('versions.destroy')
  ->middleware('auth');
Route::put('versions/{id}/restore', [VersionController::class, 'restore'])
  ->name('versions.restore')
  ->middleware('auth');
// Feedbacks
Route::get('feedbacks', [FeedbackController::class, 'index'])
  ->name('feedbacks')
  ->middleware('auth');
Route::get('feedbacks/{id}/edit', [FeedbackController::class, 'edit'])
  ->name('feedbacks.edit')
  ->middleware('auth');
Route::put('feedbacks/{id}', [FeedbackController::class, 'update'])
  ->name('feedbacks.update')
  ->middleware('auth');
Route::delete('feedbacks/{feedback}', [FeedbackController::class, 'destroy'])
  ->name('feedbacks.destroy')
  ->middleware('auth');
Route::put('feedbacks/{id}/restore', [FeedbackController::class, 'restore'])
  ->name('feedbacks.restore')
  ->middleware('auth');
// Publications
Route::get('publications', [PublicationController::class, 'index'])
  ->name('publications')
  ->middleware('auth');

Route::get('publications/create', [PublicationController::class, 'create'])
  ->name('publications.create')
  ->middleware('auth');

Route::post('publications', [PublicationController::class, 'store'])
  ->name('publications.store')
  ->middleware('auth');

Route::get('publications/{id}/show', [PublicationController::class, 'details'])
  ->name('publications.details')
  ->middleware('auth');

Route::get('publications/{id}/edit', [PublicationController::class, 'edit'])
  ->name('publications.edit')
  ->middleware('auth');

Route::put('publications/{publication}', [PublicationController::class, 'update'])
  ->name('publications.update')
  ->middleware('auth');

Route::delete('publications/{publication}', [PublicationController::class, 'destroy'])
  ->name('publications.destroy')
  ->middleware('auth');

Route::put('publications/{id}/restore', [PublicationController::class, 'restore'])
  ->name('publications.restore')
  ->middleware('auth');

Route::post('publications/{publication}/photo', [PublicationController::class, 'deletePhoto'])
  ->name('publications.photo.destroy')
  ->middleware('auth');



// Helpers
Route::get('countries/{country}/states/list', [CountryController::class, 'listStates'])
->name('countries.state.list');

Route::get('terms_of_use', function () {
  return Inertia::render('TermsConditions/Terms');
});

Route::get('privacy_policy', function () {
  return Inertia::render('TermsConditions/PrivacyPolicy');
});


// Utiles

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\CallHistory;
use App\Http\Resources\CallHistoryResource;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\DB;

// Route::get('get-cron', function () {
//   return response(DB::select('select * from test'));
// });

// Route::get('reset-test', function () {
//   DB::update('update test set count = 0, count_write_messages = 0, count_read_messages = 0, count_list_group = 0, count_get_users=0, count_list_publication=0');
//   return response(DB::select('select * from test'));
// });

Route::get('test', function () {
  return response()->json(CallHistoryResource::collection(CallHistory::all()));
});

Route::get('phpinfo', function () {
  return response(phpinfo());
});

// Route::get('app-reset', function () {
//   Artisan::call('migrate:fresh');
//   Artisan::call('db:seed');
//   Storage::deleteDirectory('public/users/');
//   Storage::deleteDirectory('public/groups/');
//   Storage::deleteDirectory('public/publications/');

//   return response('OK');
// });

Route::get('schedule', function () {
  Artisan::call('generate:groups');
  return response('OK');
});

Route::get('failed-jobs', function () {
  $jobs = DB::select('select * from failed_jobs');
  return response($jobs);
});

Route::get('delete-failed-jobs', function () {
  return response(DB::delete('delete from failed_jobs'));
});













