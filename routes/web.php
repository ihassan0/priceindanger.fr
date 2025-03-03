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
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
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

Route::post('/cookie/consent', function (Request $request) {
    $consent = $request->input('consent');
    $cookie = Cookie::make('cookie_consent', $consent, 60 * 24 * 30); // 30 days

    return response()->json(['message' => 'Cookie preference saved.'])->cookie($cookie);
})->name('cookie.consent');

Route::get('/run-scheduler', function () {
    Artisan::call('schedule:run');
    return 'Scheduler has been triggered!';
});

Route::get('/occasions-spéciales/{id}', [IndexController::class, 'event'])->name('event');
Route::get('/magasins', [IndexController::class, 'allStores'])->name('allStores');
Route::get('/magasins/{id}/{name}', [IndexController::class, 'storeView'])->name('storeView');
Route::get('/catégories', [IndexController::class, 'allCategories'])->name('allCategories');
Route::get('/catégories/{id}', [IndexController::class, 'categoryView'])->name('categoryView');
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