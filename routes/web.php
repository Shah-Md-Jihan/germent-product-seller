<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewslatterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;



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



Auth::routes();
// FrontendController Routes 
Route::get('/', [FrontendController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin area
Route::get('/admin/home', [HomeController::class, 'adminIndex'])->name('admin.home')->middleware('is_admin');

// category controller routes
Route::get('admin/add/category', [CategoryController::class, 'index'])->name('category');
Route::post('admin/add/category', [CategoryController::class, 'addcategorypost'])->name('add.category');
Route::get('admin/update/category/{category_id}', [CategoryController::class, 'updatecategory']);
Route::post('admin/update/category/post', [CategoryController::class, 'updatecategorypost']);
Route::get('admin/delete/category/{category_id}', [CategoryController::class, 'deletecategorypost']);
Route::get('admin/sub/category', [CategoryController::class, 'subcategory'])->name('sub.category');
Route::post('admin/sub/category/post', [CategoryController::class, 'subcategorypost'])->name('post.subcategory');
Route::get('admin/sub/category/edit/{subcategory_id}', [CategoryController::class, 'subcategoryedit']);
Route::post('admin/sub/category/edit/post', [CategoryController::class, 'subcategoryeditpost']);
Route::get('admin/sub/category/delete/{subcategory_id}', [CategoryController::class, 'subcategorydelete']);


// BrandController Routes
Route::get('admin/add/brand', [BrandController::class, 'addbrand'])->name('brand');
Route::post('admin/add/brand/post', [BrandController::class, 'addbrandpost'])->name('add.brand');
Route::get('admin/brand/edit/{brand_id}', [BrandController::class, 'editbrand']);
Route::post('admin/brand/edit/post', [BrandController::class, 'editbrandpost'])->name('edit.brand');
Route::get('admin/brand/delete/{brand_id}', [BrandController::class, 'deletebrand']);

// CouponController Routes
Route::get('admin/coupon', [CouponController::class, 'coupon'])->name('coupon');
Route::post('admin/coupon/store', [CouponController::class, 'couponstore'])->name('store.coupon');
Route::get('admin/coupon/deactive/{coupon_id}', [CouponController::class, 'coupondeactive']);
Route::get('admin/coupon/active/{coupon_id}', [CouponController::class, 'couponactive']);
Route::get('admin/coupon/edit/{coupon_id}', [CouponController::class, 'couponedit']);
Route::post('admin/coupon/edit/post', [CouponController::class, 'couponeditpost'])->name('edit.coupon');
Route::get('admin/coupon/delete/{coupon_id}', [CouponController::class, 'coupondelete']);


// FrontendController Routes
Route::post('newslatter/post', [FrontendController::class, 'storenewslatter'])->name('store.newslatter');
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/faq', [FrontendController::class, 'faq']);
Route::get('/contact', [FrontendController::class, 'contact']);

Route::get('shop', [FrontendController::class, 'shop']);
Route::get('category/product/{category_id}', [FrontendController::class, 'categoryproduct']);

// NewslatterController Routes
Route::get('newsletter', [NewslatterController::class, 'newsletter'])->name('newsletter');
Route::get('newsletter/all/delete', [NewslatterController::class, 'newsletteralldel'])->name('all.del.newsletter');
Route::get('newsletter/delete/{newsletter_id}', [NewslatterController::class, 'newsletterdel']);

// ProductController Routes
Route::get('add/product', [ProductController::class, 'addproduct'])->name('add.product');

Route::post('add/product/post', [ProductController::class, 'addproductpost'])->name('productpost');
Route::get('product/single/{product_id}', [FrontendController::class, 'productsingle']);


// get subcategory by ajax
Route::get('get/subcategory/{category_id}', [ProductController::class, 'getSubcat']);


// CartController Routes 

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/post', [CartController::class, 'addtocart']);
Route::get('cart/delete/{cart_id}', [CartController::class, 'deletecart']);

// CheckoutController Routes 
Route::get('checkout', [CheckoutController::class, 'checkout']);

// OrderController Routes 
Route::post('add/order', [OrderController::class, 'addorder']);


Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
