<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/customer/home');
});
Route::get('/admin/home', function () {
    return view('admin.home');
})->middleware('auth')->name('admin.home');

Route::get('/customer/home', function () {
    return view('customer.home');
})->name('customer.home');



Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::get('/verify-account/{token}', [RegisterController::class, 'verify'])->name('account.verify');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//search-customer
Route::get('/search-result', [SearchController::class, 'searchResults'])->name('customer.search-result');
Route::get('/customer/contact', [\App\Http\Controllers\UsersController::class, 'viewContact'])->name('customer.contact');

///product
Route::get('/admin/products', [ProductsController::class, 'viewAdminProducts'])->name('admin.products');
Route::get('/admin/create/product', [ProductsController::class, 'viewCreateProduct'])->name('admin.create-product');
Route::post('/admin/create/product', [ProductsController::class, 'createProduct']);
Route::delete('/home/product/{id}', [ProductsController::class, 'deleteProductById']);
Route::get('/admin/edit-product/{id}', [ProductsController::class, 'viewEditProduct'])->name('admin.edit-product');
Route::post('/admin/edit/product/{id}', [ProductsController::class, 'editProductById']);
// Trong file routes/web.php



//category
Route::get('/admin/categories', [CategoriesController::class, 'viewAdminCategories'])->name('admin.categories');
Route::post('/admin/create/category', [CategoriesController::class, 'createCategory']);
Route::delete('/home/category/{id}', [CategoriesController::class, 'deleteCategoryById']);
Route::get('/admin/edit-category/{id}', [CategoriesController::class, 'viewEditCategory'])->name('admin.edit-category');
Route::post('/admin/edit/category/{id}', [CategoriesController::class, 'editCategoryById']);


//brands
Route::get('/admin/brands', [BrandsController::class, 'viewAdminBrands'])->name('admin.brands');
Route::post('/admin/create/brand', [BrandsController::class, 'createBrand']);
Route::delete('/home/brand/{id}', [BrandsController::class, 'deleteBrandById']);
Route::get('/admin/edit-brand/{id}', [BrandsController::class, 'viewEditBrand'])->name('admin.edit-brand');
Route::post('/admin/edit/brand/{id}', [BrandsController::class, 'editBrandById']);

//orders-admin
Route::get('/admin/orders', [\App\Http\Controllers\OrderController::class, 'viewAdminOrders'])->name('admin.orders');


//user-admin
Route::get('/admin/users', [\App\Http\Controllers\UsersController::class, 'viewAdminUsers'])->name('admin.users');
// sua fil nay
Route::post('/search', [SearchController::class, 'searchByName']);


// Cart
//Route::get('/', [\App\Http\Controllers\CartController::class, 'viewCart'])->middleware('auth')->name('cart.viewCart');
Route::get('/add/{product}', [\App\Http\Controllers\CartController::class, 'add'])->middleware('auth')->name('cart.add');
Route::get('/delete/{product}', [\App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::get('/customer/cart/update/{product}', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('/clear', [\App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

//order
Route::post('customer/buy-now/{product_id}', [OrderController::class, 'buyNow'])->name('customer.buy-now');
Route::get('customer/order-detail', [OrderController::class, 'viewOrder'])->name('customer.order-detail');
Route::post('customer/order-save', [OrderController::class, 'newOrder'])->name('customer.order-save');

Route::post('customer/buy-inCart', [OrderController::class, 'buyInCart'])->name('customer.buy-inCart');
Route::post('customer/buy-save/{product_id}', [OrderController::class, 'buySave'])->name('customer.buy-save');


//history-customer
Route::get('/customer/view-orders', [OrderDetailsController::class, 'viewCustomerOrders'])->name('customer.view-orders');
Route::get('customer/show-detai-history/{id}', [\App\Http\Controllers\HistoryController::class, 'showDetailHistory'])->name('customer.showDetailHistory');




//customer
Route::get('/customer/home', [ProductsController::class, 'showProducts'])->name('customer.home');
Route::get('/customer/view-detail/{id}', [ProductsController::class, 'viewDetailProduct'])->name('customer.view-detail');
Route::get('/customer/cart', [\App\Http\Controllers\CartController::class, 'viewCart'])->middleware('auth')->name('customer.cart');
Route::get('/customer/view-brand/{brand_id}', [\App\Http\Controllers\BrandsController::class, 'showProductsByBrand'])->name('customer.view-brand');
Route::get('/customer/view-categories/{category_id}', [\App\Http\Controllers\CategoriesController::class, 'showProductsByCategory'])->name('customer.view-categories');

Route::get('/customer/view-product/{brand_id}/{category_id}', [\App\Http\Controllers\CategoriesController::class, 'showProductsByCategoryBrand'])->name('customer.view-brand-category');





//order-details
Route::get('/admin/order-detail/{order_id}', [OrderDetailsController::class, 'viewOrderDetail'])->name('admin.order-detail');
Route::get('/customer/view-orders', [OrderDetailsController::class, 'viewCustomerOrders'])->name('customer.view-orders');
Route::post('/admin/accept-order/{order_id}', [OrderController::class, 'acceptOrder'])->name('admin.accept');
Route::post('/customer/cancel-order2/{order_id}', [OrderController::class, 'cancelOrder'])->name('customer.cancel');
Route::post('/admin/update-order/{order_id}', [OrderController::class, 'updateOrder'])->name('admin.update-order');
Route::post('/admin/update-save/{order_id}', [OrderController::class, 'updateSave'])->name('admin.update-save');
Route::post('/customer/update-done/{order_id}', [OrderController::class, 'doneOrder'])->name('customer.done');


Route::get('/customer/order-detail/{order_id}', [OrderDetailsController::class, 'customerOrderDetail'])->name('customer.order-detail');

//admin hủy
Route::post('/admin/cancel-order/{order_id}', [OrderController::class, 'cancelOrder2'])->name('admin.cancel-order');

// thống kê
Route::get('admin/get-dashboard-data', [ProductsController::class,'getDashboardData'])->name('admin.get-dashboard-data');
