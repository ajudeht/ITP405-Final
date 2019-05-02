<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class BoardListController extends Controller
{
  public function index(){
    if (Auth::check()){
          $user = Auth::user();
      $boards = DB::table('boards')->where('user_id', $user->id)->get();
      return view('boards', ["boards"=>$boards, "user"=>$user]);
    } else {
      return redirect('/login');
    }
  }
}
