<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Person;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\WishList;
use App\Models\Version;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiContoller extends Controller
{
    //

    public function login(Request $request)
    {
        if (
            !isset($request->email) ||
            !isset($request->password)
        ) {
            return
                [
                    "status" => false,
                    "message" => "Not Sufficient Parameter",
                    "person" => null
                ];

        } else {
            $table = Person::where("email", $request->email)
                ->
                where('password', $request->password)
                ->where('status',true)->first();


            if ($table != null) {
                return
                    [
                        "status" => true,
                        "message" => "Registered Successfully!!!",
                        "person" => $table
                    ];
            } else {
                return
                    [
                        "status" => false,
                        "message" => "Username or password invalid",
                        "person" => null
                    ];
            }


        }

    }

    public function register(Request $request)
    {
        if (
            !isset($request->username) ||
            !isset($request->password) ||
            !isset($request->email) ||
            !isset($request->mobileno)
        ) {

            return
                [
                    "status" => false,
                    "message" => "Not Sufficient Parameter",
                    "person" => null
                ];
        } else {

            $table = new Person();
            $table->username = $request->username;
            $table->email = $request->email;
            $table->mobileno = $request->mobileno;
            $table->password = $request->password;
            $table->status = true;
            $table->save();

            return
                [
                    "status" => true,
                    "message" => "Registered Successfully!!!",
                    "person" => $table
                ];
        }
    }

    public function getData(Request $request)
    {

        $banner_data = Banner::where('status', true)->get();
        $category_data = Category::get();
        $coupon_data = Coupon::where('status', true)->get();
        $store_data = Store::get();
        $product_data = Product::get();
        $blog_data = Blog::get();


        if($request->uid!=0){
            $uid=$request->uid;
            foreach($product_data as $service){
                $data=WishList::where('uid',$uid)->where('sid',$service->_id)->first();
                if($data!=null){
                    $service->is_wish=true;
                }
            }
        }else{
            foreach($product_data as $service){
                    $service->is_wish=false;
            }
        }


        return
            [
                "status" => true,
                "message" => "getting data",
                "banner_data" => $banner_data,
                "category_data" => $category_data,
                "coupon_data" => $coupon_data,
                "store_data" => $store_data,
                "product_data" => $product_data,
                "blog_data" => $blog_data


            ];
    }
    public function addorder(Request $request)
    {
        $uid = $request->uid;
        $pid = $request->pid;
        $data = Order::where('uid', $uid)
            ->where('pid', $pid)
            ->where('status', 0)->first();
        if ($data == null) {
            $table = new Order();
            $product = Product::find($pid);
            //select * from tvl_product where id=pid
            $table->pid = $pid;
            $table->uid = $uid;
            $table->p_name = $product->p_name;
            $table->p_pic1 = $product->p_pic1;
            $table->qty = 1;
            $table->amount = (int) $product->p_price;
            $table->tot_amount = (int) $product->p_price;
            $table->c_discount = (int) $request->c_discount;
            $table->date = $request->date;
            $table->time = $request->time;
            $table->status = 0;
            $table->c_o = $request->c_o;

            $table->c_code = $request->c_code;
            $table->address = $request->address;
            $table->save();


            $data = Order::where('uid', $uid)

                ->where('status', 0)->get();
            return [
                "status" => true,
                "message" => "Added to cart",
                "order" => $data
            ];







        } else {
            $data->qty = $request->qty;
            $data->tot_amount = (int) $request->qty * (int) $request->amount;
            $data->save();
            $data = Order::where('uid', $uid)

                ->where('status', 0)->get();

            return [
                "status" => true,
                "message" => "Added to cart",
                "order" => $data
            ];


        }
    }


    public function removeOrder(Request $request)
    {
        $uid = $request->uid;
        Order::find($request->id)->delete();

        $data = Order::where('uid', $uid)
            ->where('status', 0)->get();
        return [
            "status" => true,
            "message" => "remove from cart",
            "order" => $data
        ];
    }
    public function updateQty(Request $request)
    {

        $uid = $request->uid;
        $id = $request->id;
        $data = Order::find($id);
        $data->qty =(int) $request->qty;
        $data->tot_amount = (int) $request->qty * (int) $data->amount;
        $data->save();


        $data = Order::where('uid', $uid)
            ->where('status', 0)->get();
        return [
            "status" => true,
            "message" => "getting",
            "order" => $data
        ];
    }

    public function addwishlist(Request $request)  {
        $uid = $request->uid;
        $pid = $request->pid;
        $data = WishList::where('uid', $uid)
            ->where('pid', $pid)
           ->first();
        if ($data == null) {
            $table = new WishList();
            $product = Product::find($pid);
            //select * from tvl_product where id=pid
            $table->pid = $pid;
            $table->uid = $uid;
            $table->p_name = $product->p_name;
            $table->p_pic1 = $product->p_pic1;
            $table->p_pic2=$product->p_pic2;
            $table->p_pic3=$product->p_pic3;
            $table->p_pic4=$product->p_pic4;
            $table->p_price=$product->p_price;
            $table->p_desc=$product->p_desc;
            $table->p_discount=$product->p_discount;
            $table->p_size=$product->p_size;
            $table->working_time=$product->working_time;
            $table->p_country=$product->p_country;
            $table->p_warranty=$product->p_warranty;
            $table->p_video=$product->p_video;
            $table->category=$product->category;

            

            $table->save();
        }
        $data = WishList::where('uid', $uid)
        ->get();
        return [
            "status"=>true,
            "message"=>"success",
            "wishlist"=>$data
        ];

    }

    public function getwishlist(Request $request)  {
        $uid = $request->uid;

        $data=WishList::where('uid',$uid)->get();
       
        return [
            "status"=>true,
            "message"=>"success",
            "wishlist"=>$data
        ];

    }


    public function removewishlist(Request $request)  {
        $id = $request->id;
        WishList::find($id)->delete();
        $data = WishList::get();
        return [
            "status"=>true,
            "message"=>"success",
            "wishlist"=>$data
        ];

    }

    public function removewishlist1(Request $request)  {
        $pid = $request->pid;
        $uid = $request->uid;

        WishList::where('pid',$pid)->where('uid',$uid)->delete();
        $data = WishList::where('uid',$uid)->get();
        return [
            "status"=>true,
            "message"=>"success",
            "wishlist"=>$data
        ];

    }

    public function getOrder(Request $request)
    {

        $data = Order::where('uid', $request->uid)
            ->where('status', (int) $request->status)
            ->get();
        return [
            "status" => true,
            "message" => "getting cart",
            "order" => $data
        ];
    }


    public function getCouponFromCode(Request $request)
    {
        if (isset($request->code)) {
            $table = coupon::where('c_code', $request->code)->first();

            if (isset($table)) {
                return [
                    'status' => true,
                    'message' => 'Coupon Applyed',
                    'coupon_data' => $table
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Invalid Coupon Code',
                    'coupon_data' => null
                ];
            }
        } else {
            return [
                'status' => false,
                'message' => 'Insufficient parameters',
                'coupon_data' => null
            ];
        }
    }



    public function confirmOrder(Request $request)
    {
        $uid = $request->uid;
        $time = Carbon::now()->format('H:i');
        $date = Carbon::now()->format('d/m/Y');

        $data = Order::where('uid', $uid)
            ->where('status', 0)->get();
        foreach ($data as $item) {
            $item->status = 1;
            $item->address = $request->address;
            $item->c_code = $request->c_code;
            $item->c_o = $request->c_o;
            $item->time = $time;
            $item->date = $date;
            $item->c_discount = $request->c_discount;
            $item->save();
        }
        $data = Order::where('uid', $uid)
            ->where('status', operator: 0)->get();
        return [
            "status" => true,
            "message" => "Order placed successfully",
            "order" => $data
        ];
    }


    public function getOrderhistory(Request $request)
    {

        $data = Order::where('uid', $request->uid)
            ->where('status', '>=', 1)
            ->get();
            
        return [
            "status" => true,
            "message" => "Order History is Fetched",
            "order" => $data
        ];
    }

    public function editprofile(Request $request){
        
        $user=Person::find($request->uid);
        $user->email=$request->email;
        $user->mobileno=$request->mobileno;
        $user->username=$request->username;

        $user->save();

        return [
            "status" => true,
            "message" => "profile updated Successfully!!!",
            "person" => $user
        ];
    }

    public function editpassword(Request $request){
        
        $user=Person::find($request->uid);
       
        $user->password=$request->password;

        $user->save();

        return [
            "status" => true,
            "message" => "Password updated Successfully!!!",
            "person" => $user
        ];
    }


    public function forgotapp(Request $request){
        $user = Person::where('mobileno', $request->mobileno)->first();
    
        if (!$user) {
            return [
                "status" => false,
                "message" => "User not found",
                "person" => null
            ];
        }
    
        return [
            "status" => true,
            "message" => "User found successfully",
            "id" => $user->id,  // Assuming 'id' is the primary key
            "username" => $user->username
        ];
    }
    



    public function getVersion()
    {


        $data=Version::get();
       
        return [
            "status"=>true,
            "message"=>"success",
            "Version"=>$data
        ];
    }

    


}
