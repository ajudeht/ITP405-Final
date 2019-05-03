<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
  public function index(){
    return view('login');
  }
  public function login(){
    $logSuccess = Auth::attempt([
      'email' => request('email'),
      'password' => request('password')
    ]);

    if ($logSuccess){
      return redirect('/');
    } else {
      return view('login', ["message"=>"Password or Email Incorrect"]);
    }
  }
  public function logout(){
    Auth::logout();
    return redirect('login');
  }
}
