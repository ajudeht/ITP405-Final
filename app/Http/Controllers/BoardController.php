<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cookie;
use Auth;

class BoardController extends Controller
{
  public function index($id){
    if (Auth::check()){
      $user = Auth::user();
      $board = DB::table('boards')->where('uuid', $id)->first();
      $tasks = DB::table('tasks')->where('board_id', $board->id)->get();
      return view('board', ["board"=>$board, "tasks"=>$tasks]);
    } else {
      return redirect('/login');
    }
  }

  public function create(){
    $user = Auth::user();
    DB::table('boards')->insert([
      'title' => request('title'),
      'description' => request('description'),
      'user_id' => $user->id,
      'uuid' => Str::uuid()
   ]);

      return redirect('/');
  }
}
