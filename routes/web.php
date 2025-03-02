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
use App\Models\Store;
use App\Models\Category;
use App\Models\Network;
use App\Models\Coupon;
use App\Models\Blog;
use App\Models\Event;
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
Route::get('/clear-route-cache', function () {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return "Route cache cleared!";
});

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
Route::get('/codes-promo', [IndexController::class, 'allCoupons'])->name('allCoupons');
Route::get('/Offres-de-reduction', [IndexController::class, 'allOffres'])->name('allOffres');
Route::get('/search-suggestions', [IndexController::class, 'getSuggestions'])->name('search.suggestions');
Route::post('/filter-coupons', [CouponController::class, 'filterCoupons'])->name('filter.coupons');
Route::post('/rate-store', [IndexController::class, 'rateStore'])->name('store.rate');
Route::post('/comments', [IndexController::class, 'storeComments'])->name('comments.store');


// Extra Pages
Route::get('/contactez-nous', [ExtraPagesController::class, 'contactUs'])->name('contactUs');
Route::get('/a-propos-de-nous', [ExtraPagesController::class, 'aboutUs'])->name('aboutUs');
Route::get('/politique-de-confidentialité', [ExtraPagesController::class, 'privacy'])->name('privacy');
Route::get('/faqs', [ExtraPagesController::class, 'faqs'])->name('faqs');
Route::get('/imprimer', [ExtraPagesController::class, 'imprint'])->name('imprint');
Route::post('/subscribe', [ExtraPagesController::class, 'subscribe'])->name('newsletter.subscribe');





// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Admin Routes 
Route::middleware(['admin'])->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            $totalStores = Store::count();
        $totalCategories = Category::count();
        $totalNetworks = Network::count();
        $totalCoupons = Coupon::count();
        $totalActiveCoupons = Coupon::where('status',1)->count();
         $totalExpiredCoupons = Coupon::where('status',0)->count();
         $totalBlogs = Blog::count();
          $totalEvents = Event::count();
        
            return view('Admin.dashboard', compact('totalStores', 'totalCategories', 'totalNetworks','totalCoupons', 'totalActiveCoupons','totalExpiredCoupons','totalBlogs', 'totalEvents'));
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
        Route::get('/searchStore', [StoreController::class, 'search'])->name('searchStore');
        Route::get('/small-banners', [BannerController::class, 'smallBanners'])->name('smallBanners');
        Route::post('/coupon/update-positions', [CouponController::class, 'updatePositions'])->name('coupon.updatePositions');
        Route::get('/storeComments', [BannerController::class, 'storeCommentsView'])->name('storeComments');
         Route::get('/emails', [BannerController::class, 'getEmailsView'])->name('emails');
         Route::post('/comment/update-status', [BannerController::class, 'updateCommentStatus'])->name('comment.updateStatus');






        









        // Add more admin routes here
    });
});