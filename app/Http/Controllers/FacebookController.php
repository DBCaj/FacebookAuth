<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function facebookPage()
    {
      return Socialite::driver('facebook')->redirect();
    }
    
    
    public function facebookCallback(Request $req)
    {
      try {
        $facebook_user = Socialite::driver('facebook')->user();
        $user = User::where('facebook_id', $facebook_user->getId())->first();
        
        if(!$user)
        {
            $new_user = User::updateOrCreate(['email' => $facebook_user->getEmail()], [
                'name' => $facebook_user->getName(),
                'facebook_id' => $facebook_user->getId(),
            ]);
            
          Auth::login($new_user, true);
          
          $req->session()->put('user', $facebook_user->getEmail);
          
          return redirect()->intended('/dashboard3');
        }
        else {
          Auth::login($user);
          return redirect()->intended('/dashboard3');
        }
      } catch(\Exception $exception) {
        dd($exception->getMessage());
      }
    }
    
    
    public function dashboard3()
    {
      $users = User::all();
      return view('dashboard', compact('users'));
    }
    
    
    public function login()
    {
      if(session()->has('user'))
      {
        return to_route('facebook.dashboard');
      }
      return view('login');
    }
    
    
    public function logout()
    {
      if(session()->has('user'))
      {
        session()->pull('user');
      }
      return redirect()->route('login.form');
    }
}
