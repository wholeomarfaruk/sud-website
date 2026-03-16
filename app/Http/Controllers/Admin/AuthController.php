<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if(Auth::check() && auth()->user()->hasPanel('admin')){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }
    public function loginAction(Request $request){
        // return $request->all();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->intended('admin/dashboard');
        }
        return back()->withInput()->with('error', 'Invalid credentials');
    }
}
