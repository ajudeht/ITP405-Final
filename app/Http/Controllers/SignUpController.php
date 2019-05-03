<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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

      $validator = Validator::make(
        [
            'name' => request('name'),
            'password' => request('password'),
            'email' => request('email')
        ],
        [
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        ]
      );

      if ($validator->fails())
      {
        $val = (array)$validator->errors();
        return view('signup', ["messages"=>reset($val)]);
      } else {
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
}
