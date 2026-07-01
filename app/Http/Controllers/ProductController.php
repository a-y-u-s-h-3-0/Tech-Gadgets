<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Product::paginate(5);
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::get();
        return view('product.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            "p_name" => "required|string|max:255",
            "p_price" => "required|numeric|min:0",
            "p_pic1" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_pic2" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_pic3" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_pic4" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_discount" => "required|numeric|min:0|max:50000",
            "p_desc" => "required|string|max:2550000",
            // Video Upload Validation: Allows only specific video formats with max size 10MB
            "p_video" => "required|file|mimes:mp4,mkv,avi,webm|max:100000",
            "p_size" => "required|string",
            "p_country" => "required|string",
            "working_time" => "required|string|min:1|max:12",
            "p_warranty" => "required|numeric|min:0|max:5",
            "category" => "required|string|max:255"
        ]);


        $table = new Product();

        $imgName1 = "product_" . time() . "_1." . $request->p_pic1->extension();
        $request->p_pic1->move(public_path('images'), $imgName1);


        $imgName2 = "product_" . time() . "_2." . $request->p_pic2->extension();
        $request->p_pic2->move(public_path('images'), $imgName2);

        $imgName3 = "product_" . time() . "_3." . $request->p_pic3->extension();
        $request->p_pic3->move(public_path('images'), $imgName3);


        $imgName4 = "product_" . time() . "_4." . $request->p_pic4->extension();
        $request->p_pic4->move(public_path('images'), $imgName4);


        $videoName = "product_" . time() . "." . $request->p_video->extension();
        $request->p_video->move(public_path('video'), $videoName);


        $table->p_name = $request->p_name;

        $table->p_price = $request->p_price;

        $table->p_discount = $request->p_discount;

        $table->p_desc = $request->p_desc;

        $table->p_size = $request->p_size;

        $table->working_time = $request->working_time;

        $table->p_country = $request->p_country;


        $table->p_warranty = $request->p_warranty;

        $table->category = $request->category;



        $table->p_pic1 = $imgName1;
        $table->p_pic2 = $imgName2;
        $table->p_pic3 = $imgName3;
        $table->p_pic4 = $imgName4;

        $table->p_video = $videoName;


        $table->save();

        return redirect('product')->withSuccess("Inserted Successfully!!!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //  
        return view('product.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::get();
        return view('product.edit', compact('product', 'category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            "p_name" => "required|string|max:255",
            "p_price" => "required|numeric|min:0",
            "p_pic1" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_pic2" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_pic3" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_pic4" => "required|file|image|mimes:jpg,jpeg,png,gif,webp,avif|max:2048",
            "p_discount" => "required|numeric|min:0|max:100000",
            "p_desc" => "required|string",
            // Video Upload Validation: Allows only specific video formats with max size 10MB
            "p_video" => "required|file|mimes:mp4,mkv,avi,webm|max:100000",
            "p_size" => "required|string",
            "p_country" => "required|string",
            "working_time" => "required|numeric|min:1|max:12",
            "p_warranty" => "required|numeric|min:0|max:5",
            "category" => "required|string|max:255"
        ]);

        //
        $table = Product::find($product->_id);
        //cat123.jpg
        if (isset($request->p_pic1)) {

            $imgName1 = "product_" . time() . "_1." . $request->p_pic1->extension();
            $request->p_pic1->move(public_path('images'), $imgName1);
            $table->p_pic1 = $imgName1;
        }

        if (isset($request->p_pic2)) {

            $imgName2 = "product_" . time() . "_2." . $request->p_pic2->extension();
            $request->p_pic2->move(public_path('images'), $imgName2);
            $table->p_pic2 = $imgName2;
        }

        if (isset($request->p_pic3)) {

            $imgName3 = "product_" . time() . "_3." . $request->p_pic3->extension();
            $request->p_pic3->move(public_path('images'), $imgName3);
            $table->p_pic3 = $imgName3;
        }

        if (isset($request->p_pic4)) {

            $imgName4 = "product_" . time() . "_4." . $request->p_pic4->extension();
            $request->p_pic4->move(public_path('images'), $imgName4);
            $table->p_pic4 = $imgName4;
        }



        if (isset($request->p_video)) {

            $videoName = "product_" . time() . "." . $request->p_video->extension();
            $request->p_video->move(public_path('video'), $videoName);
            $table->p_video = $videoName;
        }






        $table->p_name = $request->p_name;

        $table->p_price = $request->p_price;

        $table->p_discount = $request->p_discount;

        $table->p_desc = $request->p_desc;

        $table->p_size = $request->p_size;

        $table->working_time = $request->working_time;

        $table->p_country = $request->p_country;


        $table->p_warranty = $request->p_warranty;

        $table->category = $request->category;





        $table->save();

        return redirect('product')->withSuccess("Updated Successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect('product')->withSuccess("Deleted Successfully!!!");

    }
}
