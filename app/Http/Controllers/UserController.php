<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function save(Request $req){
        $data = new User;
        $data->first_name = $req->input('fname');
        $data->last_name = $req->input('lname');
        $data->email = $req->input('email');
        $data->password = $req->input('password');
        $data->save();
        $req->session()->flash('status','Account Create Successfully');
        return redirect('login');

    }

    function userLogin(Request $req){
        $getdata = User::firstwhere('email', $req->email);
        $pass = User::where('password', $req->password)->count();
        $email = User::where('email', $req->email)->count();

       if ($pass == 1 && $email == 1){

                   $data =  $req->input();
        $req->session()->put('email',$data['email']);
           $req->session()->put('fname',$getdata->first_name);

        return redirect('home');

       }else{
           $req->session()->flash('error',' Email/Password is wrong!');
           return redirect('login');
       }



    }

    function uploadFile(Request $req){
        $getdata = User::firstwhere('email', $req->email);
        $id =  $getdata->id;


        if($req->file('file') != null){
            $imageName = time().'.'.$req->file->extension();
            $req->file->move('profile-img', $imageName);
        $data =  User::find($id);
        $data->profile = $imageName;
        $data->save();
            $req->session()->put('image',$imageName);

            $req->session()->flash('success',' Profile Image Upload Successfully');
            return  redirect ('profile');

        }else{
            $req->session()->flash('error','Please Select Profile Image');
            return redirect('profile');
        }

    }
}
