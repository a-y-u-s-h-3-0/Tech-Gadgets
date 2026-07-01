<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Category::paginate(5);
        return view('category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation
        $request->validate(
            [
                "cat_name" => "required | Unique:category",
                "cat_pic" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:4194304"
            ]
        );
        //
        $table = new Category();
        //cat123.jpg
        $imgName = "cat_" . time() . "." . $request->cat_pic->extension();
        $request->cat_pic->move(public_path('images'), $imgName);

        $table->cat_name = $request->cat_name;
        $table->cat_pic = $imgName;
        $table->save();

        return redirect('category')->withSuccess("Inserted Successfully!!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //

         // Validation
         $request->validate(
            [
                "cat_name" => "required | Unique:category",
                "cat_pic" => "required"
            ]
        );
        $table = Category::find($category->_id);


        $table->cat_name = $request->cat_name;
        if (isset($request->cat_pic)) {
            $imgName = "cat_" . time() . "." . $request->cat_pic->extension();
            $request->cat_pic->move(public_path('images'), $imgName);
            $table->cat_pic = $imgName;
        }

        $table->save();

        return redirect('category')->withSuccess("Updated Successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect('category')->withSuccess("Deleted Successfully!!!");
    }


    
}
