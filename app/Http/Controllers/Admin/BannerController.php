<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::with('store')->get();
        // dd($banners);
        return view('Admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        $stores = Store::all();
        return view('Admin.banners.edit', compact('banner', 'stores')); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        // Validate form inputs
        $validatedData = $request->validate([
            'banner' => 'nullable|image|mimes:webp|max:2048',
            'store_id' => 'required|exists:stores,id',
            'link' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);
    
        // Handle file upload for banner image
        if ($request->hasFile('banner')) {
            // Delete old banner image if exists
            if ($banner->banner && Storage::disk('public')->exists($banner->banner)) {
                Storage::disk('public')->delete($banner->banner);
            }
    
            // Store new banner image with a unique name
            $filePath = $request->file('banner')->store('banners', 'public');
            $validatedData['banner'] = $filePath;
        }
    
        // Update the banner fields
        $banner->update($validatedData);
    
        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
