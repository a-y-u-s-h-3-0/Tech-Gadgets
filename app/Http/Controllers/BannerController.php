<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $data = Banner::paginate(5);
        return view('banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                "banner_name" => "required | Unique:Banner",
                "banner_pic" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:4194304",

            ]
        );
        //
        $table = new Banner();
        //cat123.jpg
        $imgName = "banner_" . time() . "." . $request->banner_pic->extension();
        $request->banner_pic->move(public_path('images'), $imgName);

        $table->banner_name = $request->banner_name;
        $table->banner_pic = $imgName;
        if(strcmp($request->status,"on")==0){
            $table->status=true;
        }else{
            $table->status=false;
        }
      
        $table->save();

        return redirect('banner')->withSuccess("Inserted Successfully!!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //

        $request->validate(
            [
                "banner_name" => "required | Unique:Banner",
                "banner_pic" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:4194304",

            ]
        );
        $table=Banner::find($banner->_id);
        

        $table->banner_name = $request->banner_name;
        if(isset($request->banner_pic)){
            $imgName = "banner_" . time() . "." . $request->banner_pic->extension();
            $request->banner_pic->move(public_path('images'), $imgName);
            $table->banner_pic = $imgName;
        }

        if(strcmp($request->status,"on")==0){
            $table->status=true;
        }else{
            $table->status=false;
        }



        // if(strcmp($_POST['status'],"on")==0){
        //     $status=true;
        // }else{
        //     $status=false;
        // }


      
        $table->save();

        return redirect('banner')->withSuccess("Updated Successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->delete();
        return redirect('banner')->withSuccess("Deleted Successfully!!!");
    }
}
