<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get(Request $request) {
      if($request->has('email')) {
        $items = DB::table('users')->where('email',$request->email)->get();
        return response()->json([
          'message' => 'UserDataGet!',
          'data' => $items
        ],200);
      } else {
        return response()->json([
          'message' => 'Not found'
        ],200);
      }
    }
    public function put(Request $request) {
      $param = [
        'email' => $request->email,
        'name' => $request->name
      ];
      DB::table('users')->where('email',$request->email)->update($param);
      return response()->json([
        'message' => "UserUpdata!",
        'data' => $param
      ],200);
    }
}
