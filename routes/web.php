<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

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

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
	
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// admin all route are here

Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class, 'show'])->name('admin.profile');
Route::get('admin/profile/edit',[AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('admin/profile/update',[AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('admin/change/password',[AdminProfileController::class, 'PasswordChange'])->name('admin.change.password');
Route::post('admin/update/password',[AdminProfileController::class, 'PasswordUpdate'])->name('admin.update.password');

//// Frontend All Routes /////
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
	$id = Auth::user()->id;
    $user = App\Models\User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/',[IndexController::class, 'index'])->name('index');
Route::get('user/logout',[IndexController::class, 'UserLogout'])->name('user.logout');
Route::post('profile/update',[IndexController::class, 'ProfileUpdate'])->name('profile.update');
Route::get('user/change/password',[IndexController::class, 'ChangePassword'])->name('change.password');
Route::post('change/password',[IndexController::class, 'userPasswordUpdate'])->name('user.password.update');