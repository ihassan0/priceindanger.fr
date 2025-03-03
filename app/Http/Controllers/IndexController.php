<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\HomeSettings;
use App\Models\Rating;
use App\Models\Store;
use App\Models\Comment;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index() {
        $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
        $banners = Banner::where('status',1)->where('is_main',1)->get();
        $sm_banners = Banner::where('status',1)->where('is_main',0)->get();
         $categories = Category::whereIn('id', [233, 291, 232, 215, 216,241, 296,258, 243,254])->get();
        $homesettings = HomeSettings::first();
        $shops = Store::inRandomOrder()->limit(20)->get();
        $endShops = Store::whereNotIn('id', $shops->pluck('id'))->inRandomOrder()->limit(20)->get();
        $exclusives = Coupon::where('exclusive_coupons',1)->where('status',1)->orderBy('created_at', 'desc')
        ->limit(15)
        ->get();
        $populars = Coupon::where('popular_coupons',1)->where('status',1) ->orderBy('created_at', 'desc')
        ->limit(15)
        ->get();
        $events = Event::where('status',1)->get();
        return view('index',compact('categories','banners','homesettings','shops','exclusives','populars','events','sm_banners','endShops','topCategories'));
    }



    // =============================================================================================================================

    // Code for special events page

    public function event($id)
    {
        $event = Event::findOrFail($id); // Ensure event exists or throw 404
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
    
        // Get counts for all coupon types within the category
        $allCouponsCount = Coupon::where('event_id', $id)->count();
        $gutescheinCount = Coupon::where('event_id', $id)->whereNotNull('code')->count();
        $angeboteCount = Coupon::where('event_id', $id)->whereNull('code')->count();
        $cashbackCount = Coupon::where('event_id', $id)
    ->whereRaw('LOWER(name) LIKE ?', ['%cashback%'])
    ->count();
    
        // Retrieve the current filter from the request
        $filter = request()->get('filter', 'all'); // Default to 'all'
    
        // Apply the filter to the coupons query
        $couponsQuery = Coupon::where('event_id', $id)->where('status', 1);
        if ($filter === 'guteschein') {
            $couponsQuery->whereNotNull('code');
        } elseif ($filter === 'angebote') {
            $couponsQuery->whereNull('code');
        } elseif ($filter === 'cashback') {
        $couponsQuery->whereRaw('LOWER(name) LIKE ?', ['%cashback%']);
    }
    
        $coupons = $couponsQuery->get();
    
        return view('pages.event', compact(
            'event',
            'events',
            'shops',
            'topCategories',
            'allCouponsCount',
            'gutescheinCount',
            'angeboteCount',
            'coupons',
            'filter',
            'cashbackCount',
        ));
    }
    

    // =============================================================================================================================

//   all stores
    public function allStores(Request $req) {
        $events = Event::where('status',1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
         $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
        $letter = $req->query('letter', null); 
        if($letter == null) {
            $letter = 'A';
        }// Get the 'letter' query parameter
    $stores = Store::query();

    if ($letter === '0-9') {
        $stores->where('name', 'regexp', '^[0-9]');
    } elseif ($letter) {
        $stores->where('name', 'like', "{$letter}%");
    }


    $stores = $stores->get();
        // $stores = Store::all();
        return view('pages.store.all-stores',compact('events','shops','letter','stores','topCategories'));
    }

// =================================================================================================================================================
    public function storeView($id, $name)
{
    // dd($id);
    $events = Event::where('status', 1)->get();
    $shops = Store::inRandomOrder()->limit(14)->get();
    $store = Store::with(['categories'])->findOrFail($id); // Ensure the store exists or throw a 404
    // dd($store);
    $categoryIds = $store->categories->pluck('id');
    // dd($categoryIds);

// Find relevant stores that have any of the same categories
$relevantStores = Store::whereHas('categories', function ($query) use ($categoryIds) {
    $query->whereIn('categories.id', $categoryIds);
})->get();
    $expectedSlug = Str::slug($store->name);

    // If the provided name doesn't match the expected slug, redirect to the correct URL
    // if ($name !== $expectedSlug) {
    //     return redirect()->route('storeView', ['id' => $id, 'name' => $expectedSlug]);
    // }
   $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();

    $userIdentifier = request()->ip() ?? request()->getClientIp() ?? 'unknown';
    $averageRating = Rating::where('store_id', $id)->avg('rating');
    $totalRatings = Rating::where('store_id', $id)->count();

    // Get counts for all coupon types
    $allCouponsCount = Coupon::where('store_id', $id)->count();
    $gutescheinCount = Coupon::where('store_id', $id)->whereNotNull('code')->count();
    $angeboteCount = Coupon::where('store_id', $id)->whereNull('code')->count();
  $cashbackCount = Coupon::where('store_id', $id)
    ->whereRaw('LOWER(name) LIKE ?', ['%cashback%'])
    ->count();

    // Retrieve the current filter from the request
    $filter = request()->get('filter', 'all'); // Default to 'all'

    // Apply the filter to the coupons query
    $couponsQuery = Coupon::where('store_id', $id)->where('status', 1);
    if ($filter === 'guteschein') {
        $couponsQuery->whereNotNull('code');
    } elseif ($filter === 'angebote') {
        $couponsQuery->whereNull('code');
    } elseif ($filter === 'cashback') {
        $couponsQuery->whereRaw('LOWER(name) LIKE ?', ['%cashback%']);
    }

    $coupons = $couponsQuery->orderBy('position', 'asc')->get();
    $discount = $coupons->first()?->discount;

    // Check if the user has already rated this store
    $userRating = Rating::where('store_id', $store->id)
        ->where('ip', $userIdentifier)
        ->first();

    return view('pages.store.view-store', compact(
        'events',
        'discount',
        'shops',
        'store',
        'topCategories',
        'userRating',
        'totalRatings',
        'averageRating',
        'allCouponsCount',
        'gutescheinCount',
        'angeboteCount',
        'coupons',
        'filter',
        'relevantStores',
        'cashbackCount'
    ));
}




    // =============================================================================================================================

    //   all CATEGORIES
    public function allCategories(Request $req)
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
         $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
        // $categories = Category::all();
        $letter = $req->query('letter', null); 
        if($letter == null) {
            $letter = 'A';
        }// Get the 'letter' query parameter
    $categories = Category::query();

    if ($letter === '0-9') {
        $categories->where('name', 'regexp', '^[0-9]');
    } elseif ($letter) {
        $categories->where('name', 'like', "{$letter}%");
    }


    $categories = $categories->get();

        return view('pages.category.all-categories', compact('events', 'shops', 'letter','categories', 'topCategories'));
    }


     // =============================================================================================================================

    //   View single category
    public function categoryView($id)
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $category = Category::findOrFail($id); // Ensure category exists or throw 404
        $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
    
        // Get counts for all coupon types within the category
        $allCouponsCount = Coupon::where('category_id', $id)->count();
        $gutescheinCount = Coupon::where('category_id', $id)->whereNotNull('code')->count();
        $angeboteCount = Coupon::where('category_id', $id)->whereNull('code')->count();
        $cashbackCount = Coupon::where('category_id', $id)
    ->whereRaw('LOWER(name) LIKE ?', ['%cashback%'])
    ->count();
    
        // Retrieve the current filter from the request
        $filter = request()->get('filter', 'all'); // Default to 'all'
       
        // Apply the filter to the coupons query
        $couponsQuery = Coupon::where('category_id', $id)->where('status', 1);
        if ($filter === 'guteschein') {
            $couponsQuery->whereNotNull('code');
        } elseif ($filter === 'angebote') {
            $couponsQuery->whereNull('code');
        }  elseif ($filter === 'cashback') {
        $couponsQuery->whereRaw('LOWER(name) LIKE ?', ['%cashback%']);
    }
    
       $coupons = $couponsQuery->orderBy('position', 'asc')->get();
    //   dd($coupons);
    
        return view('pages.category.view-category', compact(
            'events',
            'shops',
            'category',
            'topCategories',
            'allCouponsCount',
            'gutescheinCount',
            'angeboteCount',
            'coupons',
            'filter',
            'cashbackCount'
        ));
    }
    



      // =============================================================================================================================

    //   all blogs
    public function allBlogs()
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $blogs = Blog::all();
         $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
        return view('pages.blogs.all-blogs', compact('events', 'shops', 'blogs','topCategories'));
    }



      // =============================================================================================================================

    //   blog view
    public function blogView($id)
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $blog = Blog::find($id);
        $blogs = Blog::all();
         $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
        return view('pages.blogs.view-blog', compact('events', 'shops', 'blogs','blog','topCategories'));
    }


    
      // =============================================================================================================================

    //   all coupons
    public function allCoupons()
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $coupons = Coupon::whereNotNull('code')->where('status', 1)->get();
         $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
        return view('pages.coupons.all-coupons', compact('events', 'shops', 'coupons','topCategories'));
    }



    
      // =============================================================================================================================

    //   all offres
    public function allOffres()
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $coupons = Coupon::whereNull('code')->where('status', 1)->get();
         $topCategories = Category::whereIn('id', [233, 287, 254, 296, 216, 291,258])->get();
        return view('pages.coupons.all-offres', compact('events', 'shops', 'coupons','topCategories'));
    }

      // =============================================================================================================================
    //  Search stores. i.e Live search

    public function getSuggestions(Request $request)
    {
        $query = $request->input('q');
        if (!$query) {
            return response()->json([]);
        }

        // Search in the 'stores' table
        $results = Store::where('name', 'LIKE', "%{$query}%")
                        ->limit(10)
                        ->get(['id', 'name','logo']); // Adjust columns as needed

        return response()->json($results);
    }


    public function rateStore(Request $request)
    {
        $validated = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Generate a unique identifier for the user (e.g., IP address)
        $userIdentifier = $request->ip() ?? $request->getClientIp() ?? 'unknown'; // Alternatively, use a more advanced fingerprinting solution
        // dd($userIdentifier);
        // Check if the user has already rated this store
        $existingRating = Rating::where('store_id', $validated['store_id'])
            ->where('ip', $userIdentifier)
            ->first();

        if ($existingRating) {
            return response()->json(['success' => false, 'message' => 'You have already rated this store.'], 403);
        }

        // Save the rating
        $rating = Rating::create([
            'store_id' => $validated['store_id'],
            'rating' => $validated['rating'],
            'ip' => $userIdentifier,
        ]);

        return response()->json(['success' => true, 'rating' => $rating]);
    }
    
    
    
    
    
    public function storeComments(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);

        // Create the comment
        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'store_id' => $request->store_id,
        ]);

        return back()->with('success', 'Commentaire soumis avec succès.');
    }


}
