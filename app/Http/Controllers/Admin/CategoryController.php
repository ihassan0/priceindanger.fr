<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(20);
        return view('Admin.category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
        ]);

        Category::create($validatedData);
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully');
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
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('admin.categories.index')->with('error', 'Category not found');
        }

        return view('Admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('admin.categories.index')->with('error', 'Category not found');
        }

        $category->update($validatedData);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('admin.categories.index')->with('error', 'Category not found');
        }

        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    
    }
}
