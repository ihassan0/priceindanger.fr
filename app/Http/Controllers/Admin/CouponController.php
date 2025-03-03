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
       
        // Validate the request for multiple coupons
    $validatedData = $request->validate([
        'name.*' => 'required|string|max:255',
        'redirect_url.*' => 'nullable',
        'code.*' => 'nullable|string|max:100',
        'discount.*' => 'nullable|string',
        'position.*' => 'nullable|integer|min:0|max:100',
        'start_date.*' => 'nullable|date',
        'expire_date.*' => 'nullable|date|after:start_date.*',
        'category_id.*' => 'nullable|integer|exists:categories,id',
        'event_id.*' => 'nullable|integer',
        'status.*' => 'nullable|boolean',
        'description.*' => 'nullable|string',
        'exclusive_coupons.*' => 'nullable|boolean',
        'popular_coupons.*' => 'nullable|boolean',
    ]);

    // Process and store each coupon
        foreach ($request->name as $key => $value) {
            //  dd((int) $request->exclusive_coupons[$key]);
            Coupon::create([
                'name' => $value,
               'redirect_url' => is_array($request->redirect_url) && isset($request->redirect_url[$key]) ? $request->redirect_url[$key] : null,
                'code' => $request->code[$key],
                'discount' => $request->discount[$key],
                'start_date' => $request->start_date[$key],
                'expire_date' => $request->expire_date[$key],
                'category_id' => $request->category_id[$key],
                'event_id' => $request->event_id[$key],
                'store_id' => $request->store[$key],
                'status' => $request->status[$key],
                'description' => $request->description[$key] ?? null,
                'exclusive_coupons' => is_array($request->exclusive_coupons) && isset($request->exclusive_coupons[$key]) ?((int) $request->exclusive_coupons[$key]) : 0,
                'popular_coupons' => is_array($request->popular_coupons) && isset($request->popular_coupons[$key]) ?((int) $request->popular_coupons[$key]) : 0,
                'position' => $request->position[$key],
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
        $events = Event::where('status',1)->get();
        return view('Admin.coupons.edit', compact('coupon', 'categories', 'stores', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'redirect_url' => 'nullable|string',
            'code' => 'nullable|string|max:255',
            'discount' => 'required|string',
            'category_id' => 'nullable',
            'event_id'=> 'nullable',
            'event_id' => 'nullable',
            'start_date' => 'nullable|date',
            'expire_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'nullable|boolean',
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


    public function filterCoupons(Request $request)
    {
        $filters = $request->filters;
        $currentEndpoint = $request->currentEndpoint;
       
    
        // Example logic for filtering
        $query = Coupon::query();
    
        if (in_array('latest', $filters)) {
            $query->orderBy('created_at', 'desc');
        }
    
        if (in_array('popular', $filters)) {
            $query->where('popular_coupons', 1);
        }
    
        if (in_array('event', $filters)) {
            $query->whereNotNull('event_id');
        }
    
        if (in_array('all', $filters)) {
            // Show all coupons, no specific filter
        }
    
        $coupons = $query->whereNotNull('code')->get();
        if ($currentEndpoint === '/offres') {
        $coupons = $query->whereNull('code')->get();

        }
    
        // Generate HTML using Blade components
        $html = '';
        foreach ($coupons as $coupon) {
            $html .= view('components.couponCard', compact('coupon'))->render();
        }
    
        return response()->json([
            'html' => $html,
            'filters' => $filters
        ]);
    }


    public function updatePositions(Request $request)
{
    $positions = $request->input('positions'); // Assume this is an array of coupon_id => position
    // dd($positions);

    foreach ($positions as $couponId => $position) {
        Coupon::where('id', $couponId)->update(['position' => $position]);
    }

    return redirect()->back();
}

    

}
