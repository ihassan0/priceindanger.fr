<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Network;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    //  Display a listing of the stores
    public function index()
    {
        $stores = Store::with(['coupons', 'networks', 'categories'])->get();
        return view('Admin.stores.index', compact('stores'));
    }

    // Show the form for creating a new store
    public function create()
    {
        $networks = Network::all();
        $categories = Category::all();
        return view('Admin.stores.create', compact('networks', 'categories'));
    }

    // Store a newly created store in the database
    public function store(Request $request)
    {
       // Validate the input data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'url' => 'required|url',
        'meta_title' => 'nullable|string|max:255',
        'meta_desc' => 'nullable|string',
        'merchant' => 'nullable|integer',
        'network_id' => 'required|integer',
        'category_id' => 'required|array',
        'logo' => 'nullable|image|mimes:webp,gif',
        'description' => 'nullable|string',
        'about_middle' => 'nullable|string',
        'how_to_use_coupon' => 'nullable|string',
        'Added_by' => 'nullable|string',
    ]);

    // Handle file uploads if any
    if ($request->hasFile('logo')) {
        $validatedData['logo'] = $request->file('logo')->store('store_logos', 'public');
    }

    // Remove category_id from validated data before creating the store
    $categoryIds = $validatedData['category_id'];
    unset($validatedData['category_id']);

    // Create the store
    $store = Store::create($validatedData);

    // Attach categories to the store
    $store->categories()->sync($categoryIds);

    return redirect()->route('admin.stores.index')->with('success', 'Store created successfully.');
    }

    // Display the specified store
    public function show($id)
    {
        $store = Store::with(['coupons'])->findOrFail($id);
        // dd($store);
        return view('admin.stores.show', compact('store'));
    }

    // Show the form for editing the specified store
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $networks = Network::all();
        $categories = Category::all();
        return view('Admin.stores.edit', compact('store', 'networks', 'categories'));
    }

    // Update the specified store in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string',
            'merchant' => 'nullable|integer',
            'network_id' => 'required|integer',
            'category_id' => 'required|array',
            'logo' => 'nullable|image|mimes:webp',
            'description' => 'nullable|string',
            'about_middle' => 'nullable|string',
            'how_to_use_coupon' => 'nullable|string',
            'Added_by' => 'nullable|string',
        ]);

        $store = Store::findOrFail($id);

        // Handle file uploads if any
        if ($request->hasFile('logo')) {
            if ($store->store_logo && Storage::disk('public')->exists($store->logo)) {
                Storage::disk('public')->delete($store->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('store_logos', 'public');
        }
        $categoryIds = $validatedData['category_id'];
        unset($validatedData['category_id']);
        $store->update($validatedData);
        $store->categories()->sync($categoryIds);

        return redirect()->route('admin.stores.index')->with('success', 'Store updated successfully.');
    }

    // Remove the specified store from the database
    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('admin.stores.index')->with('success', 'Store deleted successfully.');
    }


     // Remove the specified store from the database
     public function addCouponsView($id)
     {
        $categories = Category::all();
        $stores = Store::all();
        $events = Event::all();
         return view('Admin.coupons.create',[
            'id' => $id,
            'categories' => $categories,
            'stores' => $stores,
            'events' => $events
         ]);
     }
}
