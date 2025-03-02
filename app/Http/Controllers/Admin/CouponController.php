<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($request);
        // Validate the request for multiple coupons
    $validatedData = $request->validate([
        'name.*' => 'required|string|max:255',
        'redirect_url.*' => 'nullable',
        'code.*' => 'nullable|string|max:100',
        'discount.*' => 'required|numeric|min:0|max:100',
        'start_date.*' => 'required|date',
        'expire_date.*' => 'nullable|date|after:start_date.*',
        'category_id.*' => 'required|integer|exists:categories,id',
        'store_id.*' => 'required|integer|exists:stores,id',
        'status.*' => 'required|boolean',
        'description.*' => 'nullable|string',
        'exclusive_coupons.*' => 'nullable|boolean',
        'popular_coupons.*' => 'nullable|boolean',
    ]);

    // Loop through each set of coupon data and create the coupons
    foreach ($validatedData['name'] as $index => $name) {
        Coupon::create([
            'name' => $name,
            'redirect_url' => $validatedData['redirect_url'][$index] ?? null,
            'code' => $validatedData['code'][$index],
            'discount' => $validatedData['discount'][$index],
            'start_date' => $validatedData['start_date'][$index],
            'expire_date' => $validatedData['expire_date'][$index],
            'category_id' => $validatedData['category_id'][$index],
            'store_id' => $validatedData['store_id'][$index],
            'status' => $validatedData['status'][$index],
            'description' => $validatedData['description'][$index] ?? null,
            'exclusive_coupons' => isset($validatedData['exclusive_coupons'][$index]) ? 1 : 0,
            'popular_coupons' => isset($validatedData['popular_coupons'][$index]) ? 1 : 0,
        ]);
    }

    return redirect()->back()->with('success', 'Coupons created successfully.');
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
    public function edit(Coupon $coupon)
    {
        $categories = Category::all();
        $stores = Store::all();
        $events = Event::all();
        return view('Admin.coupons.edit', compact('coupon', 'categories', 'stores', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'redirect_url' => 'nullable'|'string',
            'code' => 'nullable|string|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'category_id' => 'required',
            'store_id' => 'required',
            'event_id' => 'nullable',
            'start_date' => 'required|date',
            'expire_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
        ]);
        $data = $request->all();
        $data['exclusive'] = $request->has('exclusive_coupons') ? 1 : 0;
        $data['popular'] = $request->has('popular_coupons') ? 1 : 0;

        // Update the coupon with the new data
        $coupon->update($data);
        return redirect()->route('admin.stores.show', $request->store_id)->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->with('success', 'Coupon deleted successfully.');
    }


    public function bulkUpload()
    {
        return view('admin.coupons.bulkUpload');
    }

    public function bulkUploadPost(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'csv_file' => 'required',
            ]);

            if ($validator->fails()) {
                // Redirect back with validation errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Retrieve the uploaded file
            $file = $request->file('csv_file');
            $filePath = $file->getRealPath();

            // Open and read the CSV file
            if (($handle = fopen($filePath, 'r')) !== false) {
                // Skip the first row if it contains headers
                $header = fgetcsv($handle, 1000, ',');

                // Loop through each row of the file
                while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                    // dd($row);

                    $category_id = null;
                    if ($row[4] != null) {
                        $category = Category::where(trim('name'), trim($row[4]))->first();

                        // dump($category);
                        if ($category) {
                            $category_id = $category->id;
                        }
                    }

                    $store_id = null;
                    if ($row[8] != null) {
                        // dump('if3');
                        $store = Store::where('name', $row[8])->first();
                        if ($store) {
                            // dump('if4');
                            $store_id = $store->id;
                        }
                    }
                    $startDate = Carbon::createFromFormat('m/d/Y', $row[5])->format('Y-m-d');
                    $expiryDate = Carbon::createFromFormat('m/d/Y', $row[6])->format('Y-m-d');
                    // Create a new coupon using the row data
                    Coupon::create([
                        'name' => $row[0],
                        'redirect_url' => $row[1],
                        'code' => $row[2],
                        'discount' => $row[3],
                        'category_id' => $category_id,
                        'start_date' => $startDate,
                        'expire_date' => $expiryDate,
                        'description' => $row[7],
                        'store_id' => $store_id,
                        'popular_coupons' => $row[9] ? $row[9] : 0,
                        'exclusive_coupons' => $row[10] ? $row[10] : 0,
                    ]);
                }

                fclose($handle);

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Coupons uploaded successfully!');
            }
            // Redirect back with an error message if the file could not be processed
            return redirect()->back()->with('error', 'Failed to process the uploaded file.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to upload coupons: ' . $e->getMessage());
        }
    }
}
