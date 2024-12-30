<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $userfield = $request->validate([
            'email' => ['required', 'email' ,'unique:users'],
            'password' => ['required' , 'min:6']
        ]);
        $userfield['password'] = bcrypt($userfield['password']);
        $user = User::create($userfield);
        auth()->login($user);
        return redirect('/dashboard');
    }
    public function getregister(){
        return view('register');
    }
    public function tologout(){
        auth()->logout(); 
        return redirect()->route('login'); 
    }
    public function tologin(Request $request){
        $loginfield = $request->validate([
            'loginemail' => ['required','email'],
            'loginpassword'=>'required'
        ]);
    
        $user = User::where('email', $loginfield['loginemail'])->first();

    if ($user && Hash::check($loginfield['loginpassword'], $user->password)) { 
        auth()->login($user);
        return redirect('/dashboard');
    } 
    else {
        return back()->withErrors(['login' => 'Invalid credentials.']);
    }

    }
    public function getlogin(){
        return view('/login');
    }
}