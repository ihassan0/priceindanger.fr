<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Network;
use App\Models\Store;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $networks = Network::select('id','name','affiliate_url')->get();
        return view('Admin.networks.index',[
           'networks' => $networks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.networks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'affiliate_url' => 'required|string'
        ]);

        $network = Network::create($validatedData);
        return redirect('admin/networks')->with('success','Network added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  $network = (object) ['Network_Name' => 'Other Stores(without network)'];
        $stores = Store::whereNull('network_id')->get();
        if($id != 0){
         $network = Network::find($id);
        $stores = Store::where('network_id',$id)->get();
        }
        return view('Affiliate_Network.stores-in-networks',[
            'stores' => $stores,
            'network' => $network
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $network =Network::find($id);
        return view('Admin.networks.edit',[
            'network' => $network
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'affiliate_url' => 'sometimes|required|url'
        ]);

        $network = Network::find($id);
        $network->update($validatedData);
        return redirect(route('admin.networks.index'))->with('success',' Network updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $network = Network::find($id);
        $network->delete();
       return redirect()->back()->with('success', 'Network Deleted');
    }
}
