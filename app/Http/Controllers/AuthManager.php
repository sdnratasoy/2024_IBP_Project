<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }


    function registration(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }


    function loginPost(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);

        $credentials=$request->only('email','password'); 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->intended('/admin');
            } elseif ($user->hasRole('customer')) {
                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/home');
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required'
        ]);

        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['password']= Hash:: make($request->password);
        $user =User::factory()->create($data);
        if(!$user){
            return redirect(route('registartion'))->with("error", "Registration failed,try again.");

        }
        return redirect(route('login'))->with("success", "Registration success, Login to access the app");

    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mevcut şifre yanlış']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('status', 'Şifre başarıyla güncellendi');
    }
}
