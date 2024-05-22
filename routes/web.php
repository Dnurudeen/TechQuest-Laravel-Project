<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SignIn;
use App\Http\Controllers\SignOut;
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
// Route::post('/', [SignIn::class, 'sign_in'])->name('staff.signin');
Route::post('/welcome', 'SignIn@sign_in')->name('staff.signin');
Route::post('/', [SignOut::class, 'sign_out'])->name('staff.signout');

Route::get('/sign-in', function () {
    return view('sign-in');
});
Route::get('/sign-out', function () {
    return view('sign-out');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@admin')->middleware('role:admin');
    Route::get('/admin/staffs', [AdminController::class, 'users']);
    Route::get('/admin/staffs/{id}', 'AdminController@trash')->name('delete.staff');
    Route::get('/admin/send-email', [AdminController::class, 'sendemail']);
    Route::post('/admin/send-email', [AdminController::class, 'send_it'])->name('send.email');


    Route::get('/admin/view-staff/{id}', [AdminController::class, 'viewstaff']);
    Route::get('/admin/edit-profile/{id}', [AdminController::class, 'editstaff']);
    Route::get('/admin/edit-profile', 'AdminController@edit')->name('admin.edit-profile');
    Route::put('/admin/edit-profile/{id}', 'AdminController@update')->name('admin.update-profile');

    Route::get('/admin/sign-in', [AdminController::class, 'signins']);
    Route::get('/admin/sign-out', [AdminController::class, 'signouts']);

    Route::get('/admin/add-staff', [AdminController::class, 'addstaff'])->name('addstaff.index');
    Route::post('/admin/add-staff', [AdminController::class, 'store'])->name('addstaff.store');
});

Route::middleware(['auth'])->group(function (){

});

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard/dashboard', 'DashboardController@user')->middleware('role:user');
    Route::get('/dashboard/view-profile', [DashboardController::class, 'view_profile']);
    Route::put('/dashboard/edit-profile', 'DashboardController@update')->name('update-profile');
    Route::get('/dashboard/edit-profile', [DashboardController::class, 'edit_profile']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\RegisterController@handleProviderCallback');

Route::group(['middleware' => ['auth', 'active_user']], function() {
    Route::get('/admin/dashboard', 'AdminController@admin')->name('block.staff');
    Route::get('/dashboard/dashboard', 'DashboardController@user')->middleware('role:user');
    // ... Any other routes that are accessed only by non-blocked user
});
