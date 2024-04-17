<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//using this to make the password secure
use Hash;
use Session;

class customauthenticationcontroller extends Controller
{
    //below two function will help in viewing the user registration system in browser, this is connected to the route
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }
    //this function is responsible to post the data in the db.
    //defined within a controller class and is used to handle incoming HTTP requests, specifically requests for registering a user.
    public function registerUser(Request $request){

        //are used to retrieve the values of form inputs with the corresponding names from the HTTP request.
        // echo "value posted";
        // When the form is submitted, the browser creates key-value pairs where the keys are the name attributes of the input fields and the values are the data entered by the user.
        $request->validate([
            'name'=>'required',
            //email|unique:user
            'email'=>'required|email|unique:user',
            'password'=>'required|max:50|min:5'
            //after registered the register-user is being targeted
        ]);
        //user is the model and creating new object is necessary
        $user=new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password=Hash::make($request->password);
        $result=$user->save();
        if($result)
        {
            return back()->with('success','You have registered successfully!!');
        }
        else{
            return back()->with('fail','Something went wrong');
        }
    }
    public function loginUser(Request $request){
        // return "hello"; aba above ko request should match the db ko data
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        //it specifies that you want to retrieve a user where the email column matches the value provided in the $request->email variable
        $user=User::where('email','=',$request->email)->first();
        //convert input pass into hash
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail','Password not matched');
            }
        }
        else{
            return back()->with('fail','This email is not registered');
        }
    }
    public function dashboard(){
        return view("auth.home");
    }
    public function logoutUser(){
        return "logged Out Successfully";
    }
    // public function forgotPassword(){
    //     return view('auth.forgot-password');
    // }
}
