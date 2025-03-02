<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\NetworkController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\ExtraPagesController;
use App\Http\Controllers\IndexController;
use App\Models\HomeSettings;
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
// Main Pages
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/event/{id}', [IndexController::class, 'event'])->name('event');
Route::get('/stores', [IndexController::class, 'allStores'])->name('allStores');
Route::get('/store/{id}', [IndexController::class, 'storeView'])->name('storeView');
Route::get('/categories', [IndexController::class, 'allCategories'])->name('allCategories');
Route::get('/category/{id}', [IndexController::class, 'categoryView'])->name('categoryView');
Route::get('/blogs', [IndexController::class, 'allBlogs'])->name('allBlogs');
Route::get('/blog/{id}', [IndexController::class, 'blogView'])->name('blogView');
Route::get('/coupons', [IndexController::class, 'allCoupons'])->name('allCoupons');
Route::get('/offres', [IndexController::class, 'allOffres'])->name('allOffres');
Route::get('/search-suggestions', [IndexController::class, 'getSuggestions'])->name('search.suggestions');

// Extra Pages
Route::get('/contact-us', [ExtraPagesController::class, 'contactUs'])->name('contactUs');
Route::get('/about-us', [ExtraPagesController::class, 'aboutUs'])->name('aboutUs');
Route::get('/privacy-policy', [ExtraPagesController::class, 'privacy'])->name('privacy');
Route::get('/faqs', [ExtraPagesController::class, 'faqs'])->name('faqs');
Route::get('/imprint', [ExtraPagesController::class, 'imprint'])->name('imprint');




// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Admin Routes 
Route::middleware(['admin'])->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('Admin.dashboard');
        })->name('dashboard');

        Route::resource('/networks', NetworkController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/events', EventController::class);
        Route::resource('/blogs', BlogController::class);
        Route::resource('/home-settings', HomeSettingController::class);
        Route::post('/upload', [HomeSettingController::class, 'upload'])->name('upload');
        Route::resource('/stores', StoreController::class);
        Route::resource('/coupons', CouponController::class);
        Route::get('/bulkupload', [CouponController::class,'bulkUpload'])->name('bulkUpload');
        Route::post('/bulkuploadPost', [CouponController::class,'bulkUploadPost'])->name('bulkUploadPost');
        Route::get('/addcoupons/{id}', [StoreController::class,'addCouponsView'])->name('addCouponsView');
        Route::resource('/banners', BannerController::class);


        









        // Add more admin routes here
    });
});