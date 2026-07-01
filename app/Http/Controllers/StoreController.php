<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Store::paginate(5);
        return view('store.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                "store_name" => "required|Unique:Store",
                "store_pic" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:4194304",
                "store_address" => "required|string",
                "store_mobileno" => "required|numeric|unique:number|digits:10",
                "store_pincode" => "required|numeric|digits:6|min:6",
                "latitude" => "required|string",
                "longitude" => "required|string"



            ]
        );
        //
        $table = new Store();
        //cat123.jpg
        $imgName = "store_" . time() . "." . $request->store_pic->extension();
        $request->store_pic->move(public_path('images'), $imgName);
        $table->store_pic = $imgName;


        $table->store_name = $request->store_name;
        $table->store_mobileno = $request->store_mobileno;
        $table->store_address = $request->store_address;
        $table->store_pincode = $request->store_pincode;
        $table->latitude = $request->latitude;
        $table->longitude = $request->longitude;



        $table->save();

        return redirect('store')->withSuccess("Inserted Successfully!!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
        return view('store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //

        $request->validate(
            [
                "store_name" => "required| Unique:Store",
                "store_pic" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:4194304",
                "store_address" => "required|string",
                "store_mobileno" => "required|numeric| Unique:number|digits:10",
                "store_pincode" => "required|numeric|digits:6|min:6",
                "latitude" => "required|string",
                "longitude" => "required|string"
            ]
        );
        $table = Store::find($store->_id);
        //cat123.jpg
        if (isset($request->store_pic)) {

            $imgName = "store_" . time() . "." . $request->store_pic->extension();
            $request->store_pic->move(public_path('images'), $imgName);
            $table->store_pic = $imgName;
        }


        $table->store_name = $request->store_name;
        $table->store_mobileno = $request->store_mobileno;
        $table->store_address = $request->store_address;
        $table->store_pincode = $request->store_pincode;
        $table->latitude = $request->latitude;
        $table->longitude = $request->longitude;



        $table->save();

        return redirect('store')->withSuccess("Updated Successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
        $store->delete();
        return redirect('store')->withSuccess("Deleted Successfully!!!");
    }
}
