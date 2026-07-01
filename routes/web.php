<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiContoller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\PersonController;



use App\Models\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\Person;

Route::get('/home',[AdminController::class,'home']);


Route::resource("category",CategoryController::class);
Route::resource('banner',BannerController::class);
Route::resource('coupon',CouponController::class);
Route::resource('blog',BlogController::class);
Route::resource('store',StoreController::class);
Route::resource('product',ProductController::class);
Route::resource('version',VersionController::class);
Route::get('/users',[PersonController::class,'users']);

Route::resource('order',OrderController::class);

Route::get('/ch_pass',[AdminController::class,'open_change_pass']);
Route::post('/change_password',[AdminController::class,'change_password']);




// Route::get('/users',[PersonController::class,'users']);
// Route::get('/block/{id}',[PersonController::class,'block']);




Route::post('/login',[AdminController::class,'login']);
Route::post('/register',[AdminController::class,'register']);

// Route::get('/',[AdminController::class,'open_login']);
Route::get('/',[AdminController::class,'open_register']);

// Route::get('/forgot_pass',[AdminController::class,'open_forgot_pwd']);

Route::get('/cpwd',[AdminController::class,'open_cpwd']);

Route::get('/status/{id}',[OrderController::class,'status']);
Route::get('/block/{id}',[PersonController::class,'block']);



Route::get('/version', [VersionController::class, 'index']);
Route::get('/getVersion', [ApiContoller::class, 'getVersion']);

Route::get('/ch_pass',[AdminController::class,'open_change_pass']);
Route::post('/change_password',[AdminController::class,'change_password']);
Route::get('/forgot_pass',[AdminController::class,'open_forgot_pwd']);

Route::post('/forgot_password',[AdminController::class,'do_fpwd']);
Route::post('/reset_password',[AdminController::class,'reset_password']);
Route::get('/logout',[AdminController::class,'logout']);


Route::post('/search',[AdminController::class,'search']);





Route::post('/api_addorder',[ApiContoller::class,'addOrder']);
Route::post('/api_getorder',[ApiContoller::class,'getOrder']);
Route::post('/api_updateqty',[ApiContoller::class,'updateQty']);
Route::post('/api_removeorder',[ApiContoller::class,'removeOrder']);
Route::post('/api_applycoupon',[ApiContoller::class,'getCouponFromCode']);
Route::post('/api_confirmOrder',[ApiContoller::class,'confirmOrder']);
Route::post('/getOrderhistory',[ApiContoller::class,'getOrderhistory']);
Route::post('/addwishlist',[ApiContoller::class,'addwishlist']);
Route::post('/removewishlist',[ApiContoller::class,'removewishlist']);
Route::post('/removewishlist1',[ApiContoller::class,'removewishlist1']);





//API Routes

Route::get('/api_data',[ApiContoller::class,'getData']);
Route::post('/api_register',[ApiContoller::class,'register']);
Route::post('/api_login',[ApiContoller::class,'login']);
Route::post('/api_editprofile',[ApiContoller::class,'editprofile']);
Route::post('/api_editpassword',[ApiContoller::class,'editpassword']);
Route::post('/api_forgotapp',[ApiContoller::class,'forgotapp']);

Route::post('/getwishlist',[ApiContoller::class,'getwishlist']);

Route::get('/editprofile',[AdminController::class,'open_edit_profile']);
Route::post('/update_profile',[AdminController::class,'update']);








