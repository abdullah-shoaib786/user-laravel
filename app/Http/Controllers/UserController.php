<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{
    function save(Request $req){
        $data = new User;
        $data->first_name = $req->fname;
        $data->last_name = $req->lname;
        $data->email = $req->email;
        $data->password =Hash::make($req->password) ;
        $data->save();
        if (auth()->attempt(request(['email','password']))){
            return redirect('home');
        }


    }
    function getId(){
        $user = auth()->user();
        return view('addProduct',compact('user'));

    }

    function userLogin(){
        if (auth()->attempt(request(['email','password']))){
            return redirect('home');
        }else{
            return redirect('login');
        }


    }
    function logout(){
        auth()->logout();
        return redirect('login');
    }

}
