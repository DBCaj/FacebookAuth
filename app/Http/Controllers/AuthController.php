<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
      if(session()->has('user'))
      {
        return to_route('dashboard2');
      }
      return view('login');
    }

  
    public function loginAuth(Request $req)
    {
      $credentials = $req->only('email', 'password');
      
      if(Auth::attempt($credentials))
      {
        $req->session()->put('user', $req->input('email'));
        return redirect()->intended('/dashboard2');
      }
      return back()
        ->withErrors([
          'invalid' => 'Invalid Credentials',
          ])
        ->withInput();
    }
    
    
    public function logout()
    {
      if(session()->has('user'))
      {
        session()->pull('user');
      }
      return redirect()->route('login.form');
    }
    
    
    public function dashboard2()
    {
      $users = User::all();
      return view('dashboard', compact('users'));
    }
}
