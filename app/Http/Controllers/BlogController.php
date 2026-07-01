<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use MongoDB\Operation\Count;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Blog::paginate(5);
        return view('blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "b_title" => "required|unique:Blog",
            "b_desc" => "required|string",
            "b_date" => "required|date",
            "b_time" => "required|date_format:H:i",
            "b_pic"  => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
        ]);
        
        $table = new Blog();
        //cat123.jpg
        $imgName = "blog_" . time() . "." . $request->b_pic->extension();
        $request->b_pic->move(public_path('images'), $imgName);

        $table->b_title = $request->b_title;
        $table->b_desc = $request->b_desc;
        $table->b_date = $request->b_date;
        $table->b_time = $request->b_time;

        $table->b_pic = $imgName;
        

        // if (strcmp($request->status, "on") == 0) {
        //     $table->status = true;
        // } else {
        //     $table->status = false;
        // }

        $table->save();

        return redirect('blog')->withSuccess("Inserted Successfully!!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //

        $request->validate([
            "b_title" => "required|unique:Blog",
            "b_desc" => "required|string",
            "b_date" => "required|date",
            "b_time" => "required|date_format:H:i",
            "b_pic"  => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
        ]);

        $table = Blog::find($blog->_id);
        //cat123.jpg

        if (isset($request->b_pic)) {
            $imgName = "blog_" . time() . "." . $request->b_pic->extension();
            $request->b_pic->move(public_path('images'), $imgName);
            $table->b_pic = $imgName;
        }


        $table->b_title = $request->b_title;
        $table->b_desc = $request->b_desc;
        $table->b_date = $request->b_date;
        $table->b_time = $request->b_time;


        // if (strcmp($request->status, "on") == 0) {
        //     $table->status = true;
        // } else {
        //     $table->status = false;
        // }

        $table->save();

        return redirect('blog')->withSuccess("Updated Successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->delete();
        return redirect('blog')->withSuccess("Deleted Successfully!!!");
    }
}
