<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (){
        return view('auth.login');
    }

    public function login (Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))){
           return back()->with('status', 'Invalid email or password.');
        } else {
            return redirect()->route('dashboard');
        }

    }
}
