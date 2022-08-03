<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\User\WishlistControllor;

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

// shipping

//Division
Route::get('/ship-division', [ShippingAreaController::class, 'divisionView'])->name('division.view');
Route::post('/ship-division/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store');
Route::get('/ship-division/edit/{id}', [ShippingAreaController::class, 'divisionEdit'])->name('division.edit');
Route::patch('/ship-division/update/{id}', [ShippingAreaController::class, 'divisionUpdate'])->name('division.update');
Route::get('/ship-division/delete/{id}', [ShippingAreaController::class, 'divisionDestroy'])->name('division.destroy');

//District
Route::get('/ship-district', [ShippingAreaController::class, 'districtView'])->name('district.view');
Route::post('/ship-district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');
Route::get('/ship-district/edit/{id}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');
Route::patch('/ship-district/update/{id}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
Route::get('/ship-district/delete/{id}', [ShippingAreaController::class, 'districtDestroy'])->name('district.destroy');
//State
Route::get('/ship-state', [ShippingAreaController::class, 'stateView'])->name('state.view');
Route::post('/ship-state/store', [ShippingAreaController::class, 'stateStore'])->name('state.store');
Route::get('/ship-state/edit/{id}', [ShippingAreaController::class, 'stateEdit'])->name('state.edit');
Route::patch('/ship-state/update/{id}', [ShippingAreaController::class, 'stateUpdate'])->name('state.update');
Route::get('/ship-state/delete/{id}', [ShippingAreaController::class, 'stateDestroy'])->name('state.destroy');
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
//Sub Category wise Product
Route::get('subcategory/product/{sub_id}/{slug}',[IndexController::class, 'SubCatWiseProduct'])->name('product.subcat');
// SubSub Category wise Product
Route::get('sub-subcategory/product/{sub_id}/{slug}',[IndexController::class, 'SubSubCatWiseProduct'])->name('product.subsubcat');
// ProductDetails
Route::get('product/details/{id}/{slug}',[IndexController::class, 'ProductDetails'])->name('product.details');
// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// mini Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::get('/product/mini/cart', [CartController::class, 'getDataMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeToCart']);
// cart page
Route::get('/mycart', [CartController::class, 'cartPageView'])->name('mycart');

Route::post('add-to-wishlist/{id}', [WishlistControllor::class, 'Addtowishlist'])->name('store.wishlist');
Route::get('/user/get-wishlist-product', [WishlistControllor::class, 'getwishlist'])->name('getwishlist');
Route::get('/user/wishlist-remove/{id}', [WishlistControllor::class, 'removewishlist'])->name('removewishlist');
Route::get('wishlist', [WishlistControllor::class, 'wishlist'])->name('wishlist');

// Checkout Routes 

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);

Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

// Frontend Coupon Option
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');

Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');

Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');

Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

