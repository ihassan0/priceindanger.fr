<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\HomeSettings;
use App\Models\Store;
use App\Models\Template;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $categories = Category::inRandomOrder()->limit(10)->get();
        $banners = Banner::where('status',1)->get();
        $homesettings = HomeSettings::first();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $exclusives = Coupon::all();
        $populars = Coupon::all();
        $events = Event::where('status',1)->get();
        return view('index',compact('categories','banners','homesettings','shops','exclusives','populars','events'));
    }



    // =============================================================================================================================

    // Code for special events page

    public function event($id) {
        // dd($id);
        $event = Event::find($id);
        $events = Event::where('status',1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();

        return view('pages.event', compact('event','events','shops'));
    }


    // =============================================================================================================================

//   all stores
    public function allStores() {
        $events = Event::where('status',1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $stores = Store::all();
        return view('pages.store.all-stores',compact('events','shops','stores'));
    }


     // =============================================================================================================================

    //   View single store
    public function storeView($id)
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $store = Store::find($id);
        $topCategories = Category::inRandomOrder()->limit(10)->get();

        return view('pages.store.view-store', compact('events', 'shops', 'store','topCategories'));
    }



    // =============================================================================================================================

    //   all CATEGORIES
    public function allCategories()
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $categories = Category::all();

        return view('pages.category.all-categories', compact('events', 'shops', 'categories'));
    }


     // =============================================================================================================================

    //   View single category
    public function categoryView($id)
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $category = Category::find($id);
        $topCategories = Category::inRandomOrder()->limit(10)->get();

        return view('pages.category.view-category', compact('events', 'shops', 'category','topCategories'));
    }



      // =============================================================================================================================

    //   all blogs
    public function allBlogs()
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $blogs = Blog::all();

        return view('pages.blogs.all-blogs', compact('events', 'shops', 'blogs'));
    }



      // =============================================================================================================================

    //   blog view
    public function blogView($id)
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $blog = Blog::find($id);
        $blogs = Blog::all();
        return view('pages.blogs.view-blog', compact('events', 'shops', 'blogs','blog'));
    }


    
      // =============================================================================================================================

    //   all coupons
    public function allCoupons()
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $coupons = Coupon::all();
        $topCategories = Category::inRandomOrder()->limit(10)->get();
        return view('pages.coupons.all-coupons', compact('events', 'shops', 'coupons','topCategories'));
    }



    
      // =============================================================================================================================

    //   all offres
    public function allOffres()
    {
        $events = Event::where('status', 1)->get();
        $shops = Store::inRandomOrder()->limit(14)->get();
        $coupons = Coupon::all();
        $topCategories = Category::inRandomOrder()->limit(10)->get();
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

}
