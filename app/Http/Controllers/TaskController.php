<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cookie;
use Auth;

class TaskController extends Controller
{
  public function create(){
    $board = DB::table('boards')->where('uuid', request('board_uuid'))->first();
    DB::table('tasks')->insert([
      'board_id' => $board->id,
      'title' => request('title'),
      'description' => request('description'),
      'task_status' => 0,
      'parent_id' => null,
      'uuid' => Str::uuid()
   ]);

      return redirect('/boards/'.request('board_uuid'));
  }

  public function updateStatus(){
    $affectedRows = DB::table('tasks')->where('uuid', request('task_uuid'))->update([
      'task_status' => intval(request('status'))
   ]);
   return "{}";
  }

}
