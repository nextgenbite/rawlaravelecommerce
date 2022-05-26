<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\LanguageController;

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
})->name('admin.dashboard');

// admin all route are here

Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class, 'show'])->name('admin.profile');
Route::get('admin/profile/edit',[AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('admin/profile/update',[AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('admin/change/password',[AdminProfileController::class, 'PasswordChange'])->name('admin.change.password');
Route::post('admin/update/password',[AdminProfileController::class, 'PasswordUpdate'])->name('admin.update.password');

Route::middleware(['auth:sanctum,admin', 'verified'])->prefix('admin')->group(function()
{
    
// Admin Brands
Route::resource('brand', BrandController::class);
Route::resource('category', CategoryController::class);
Route::resource('subcategory', SubCategoryController::class);
Route::resource('subsubcategory', SubSubCategoryController::class);

Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);

Route::get('/subsubcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
// products
Route::resource('product', ProductController::class);
Route::get('/product/active/{id}', [ProductController::class, 'productActive']);
Route::get('/product/inactive/{id}', [ProductController::class, 'productInactive']);
// slider
Route::resource('slider', SliderController::class);
Route::get('/slider/active/{id}', [SliderController::class, 'sliderActive']);
Route::get('/slider/inactive/{id}', [SliderController::class, 'sliderInactive']);

// slider
Route::resource('coupon', CouponController::class);
});

//// Frontend All Routes /////
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
	$id = Auth::user()->id;
    $user = App\Models\User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');


// Multi Language
Route::get('/language/english',[LanguageController::class, 'english'])->name('english.language');
Route::get('/language/bangla',[LanguageController::class, 'bangla'])->name('bangla.language');
Route::get('/',[IndexController::class, 'index'])->name('index');
Route::get('user/logout',[IndexController::class, 'UserLogout'])->name('user.logout');
Route::post('profile/update',[IndexController::class, 'ProfileUpdate'])->name('profile.update');
Route::get('user/change/password',[IndexController::class, 'ChangePassword'])->name('change.password');
Route::post('change/password',[IndexController::class, 'userPasswordUpdate'])->name('user.password.update');
// ProductDetails
Route::get('product/details/{id}/{slug}',[IndexController::class, 'ProductDetails'])->name('product.details');