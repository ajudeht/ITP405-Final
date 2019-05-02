<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Hash;
use Auth;

class SignUpController extends Controller
{
    public function index(){
      return view('signup');
    }
    public function signup(){
      $user = new User();
      $user->name = request('name');
      $user->email = request('email');
      $user->uuid = Str::uuid();
      $user->password = Hash::make(request('password')); //bcrypt
      $user->save();

      Auth::login($user);
      return redirect('/');

    }
}
