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
      $shares = DB::table('board_sharing')->join('boards', 'boards.id', 'board_sharing.board_id')->where('board_sharing.user_id', $user->id)->get();
      return view('boards', ["boards"=>$boards, "shares"=>$shares, "user"=>$user]);
    } else {
      return redirect('/login');
    }
  }
}
