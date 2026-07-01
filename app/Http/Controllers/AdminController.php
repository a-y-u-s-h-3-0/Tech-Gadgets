<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Blog;
use App\Models\Store;
use App\Models\Person;







use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function open_register()
    {
        return view('login');
    }

    public function open_edit_profile()
    {
        return view('editprofile');
    }
    public function update(Request $request)
    {
        $user = session()->get('user');
    
        // Validate the input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'mobileno' => 'nullable|string|max:20',
            'pic' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update the user's profile
       $u=Admin::find($user->id);
    //    dd($u);
       $u->username=$request->username;
       $u->email=$request->email;
       $u->mobile=$request->mobileno;
       $u->bio=$request->bio;
    
    
       if(isset($request->pic)){
        $imgName = "dp_" . time() . "." . $request->pic->extension();
        $request->pic->move(public_path('images'), $imgName);
        $u->pic = "/images/". $imgName;
    }
    $u->save();
    
        session()->put('user',$u);
    
        return redirect('home')->with('success', 'Profile updated successfully!');
    }

    public function open_change_pass()
    {
        return view('ch_pass');
    }

    public function change_password(Request $request){
    $user = session()->get('user');
    $request->validate([
        'password' => 'required|string',
        'cpassword' => 'required|same:password',
    ]);

   $u=Admin::find($user->id);
    $u->password=$request->password;
    $u->save();
    return redirect('/logout');
    }


    public function register(Request $request)
    {

        $request->validate([
            "username" => "required |unique:admins",
            "password" => "required|min:6|max:8",
            "cpassword" => "required|same:password",
            "email" => "required|email",
            "mobile" => "required|numeric|digits:10",
            "answer" => "required"
        ]);

        $table = new Admin();
        $table->username = $request->username;
        $table->password = $request->password;
        $table->mobile = $request->mobile;
        $table->email = $request->email;
        $table->sec_que = $request->sec_que;
        $table->answer = $request->answer;

        $table->save();
        return redirect('/')->withSuccess("Registered Successfully");
    }

    public function open_login()
    {

        $user = session()->get('user');
        if (isset($user)) {
            return redirect("home");
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {

        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $data = Admin::where("username", $request->username)
            ->where('password', $request->password)->first();

        if ($data != null) {
            session()->put("user", $data);
            return redirect('home');
        } else {
            return back()->with('Invalid username or password');
        }

    }



    public function home()
    {
        $total_revenue=Order::where('status','>',1)->sum('tot_amount');
        $c_count=Category::count();
        $b_count=Banner::count();
        $s_count=Store::count();
        $cou_count=Coupon::count();
        $p_count=Product::count();
        $u_count=Person::count();
        $bl_count=Blog::count();
        $user=Person::get();
        $completed_orders=Order::where('status',3)->count(); 
        $pending_orders=Order::where('status',1)->count(); 
        $cancelled_orders=Order::where('status',4)->count(); 
        $o_count=Order::where('status','>=',1)->count();

        $orders=Order::where('status','>',1)->get();
        $cash_count=Order::where('c_o',"cash")->count();





        return view('home',compact('user','cash_count','orders','total_revenue','cancelled_orders','pending_orders','completed_orders','u_count','o_count','c_count','cou_count','b_count','bl_count','s_count','p_count'));
    }

    

    public function open_forgot_pwd()
    {
        return view('fpassword');
    }

    public function do_fpwd(Request $request)
    {
        $table = Admin::where('username', $request->username)
            ->where('sec_que', $request->sec_que)
            ->where('answer', $request->answer)->first();

        if ($table == null) {
            return back()->withSuccess("Invalid Username or Password");
        } else {
            $username = $request->username;
            return view('change', compact('username'));

        }


    }

    public function reset_password(Request $request)
    {
        $request->validate([
            "password" => "required",
            "cpassword" => "required "
            //  | same:password"
        ]);

        $table = Admin::where('username', $request->username)->first();
        $table->password = $request->password;
        $table->save();

        return redirect("/")->withSuccess("Password reset successfully!!!");



    }

    public function open_cpwd()
    {

        return view('change');
    }


    public function logout()
    {
        session()->flush();
        return redirect("/");
    }


    public function search(Request $request)
    {
        // Access the 'query' parameter from the request
        $query = $request->input('query'); // Use input() to get the query parameter
    
        // Search across multiple columns in the 'products' table
        $data = Product::where('p_name', 'like', "%$query%")
            // ->orWhere('brand', 'like', "%$query%")
            ->orWhere('category', 'like', "%$query%")
            // ->orWhere('shoes_heel_type', 'like', "%$query%")
            ->get();
    
        return view('search', compact('data'));
    }
}


