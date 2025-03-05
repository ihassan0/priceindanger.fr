<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeSetting = HomeSettings::first();
        return view('Admin.home-settings.index', compact('homeSetting'));
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
        $homeSetting = HomeSettings::findOrFail($id);
        return view('Admin.home-settings.edit', compact('homeSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData= $request->validate([
            'description' => 'required|string',
            'contact_us' => 'required|string',
            'privacy_policy' => 'required|string',
           'navbar_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $homeSetting = HomeSettings::findOrFail($id);
        if ($request->hasFile('navbar_image')) {
            // Delete old banner image if exists
            if ($homeSetting->navbar_image && Storage::disk('public')->exists($homeSetting->navbar_image)) {
                Storage::disk('public')->delete($homeSetting->navbar_image);
            }
    
            // Store new banner image with a unique name
            $filePath = $request->file('navbar_image')->store('banners', 'public');
            $validatedData['navbar_image'] = $filePath;
        }
        // $homeSetting->update($request->only([
        //     'description',
        //     'contact_us',
        //     'privacy_policy',
        // ]));

        $homeSetting->update($validatedData);

        return redirect()->route('admin.home-settings.index')->with('success', 'Home settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function upload(Request $request)
{
    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = time() . '-' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $filename, 'public');

        $url = asset('storage/uploads/' . $filename);

        // Return the URL as a JSON response (required by TinyMCE)
        return response()->json(['url' => $url], 200);
    }

    return response()->json(['error' => 'Upload failed'], 400);
}

    
}
