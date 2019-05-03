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
      $shares = DB::table('board_sharing')->join('users', 'users.id', 'board_sharing.user_id')->where('board_id', $board->id)->get();

      return view('board', ["board"=>$board, "tasks"=>$tasks, "shares"=>$shares]);
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

  public function share(){
    $user = Auth::user();
    $board = DB::table('boards')->where('uuid', request('board_uuid'))->first();
    $getUser = DB::table('users')->where('email', request('email'))->first();

    DB::table('board_sharing')->insert([
      'board_id' => $board->id,
      'user_id' => $getUser->id,
      'permissions' => 0
   ]);

       return back();
        //return back()->withInput();
  }

  public function delete($id){
    $user = Auth::user();
    DB::table('boards')->where('uuid', $id)->delete();

      return redirect('/');
  }
}
