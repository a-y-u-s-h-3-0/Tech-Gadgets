<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function users(){
        $data=Person::paginate(10);
        return view('user',compact('data'));
       }
       public function block($id){
        $user=Person::find($id);
        if($user->status){
            $user->status=false;
        }else{
            $user->status=true;
        }
        $user->save();
    
        return redirect("/users");
       }

       
}
