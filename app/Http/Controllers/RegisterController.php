<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function post(Request $request) {
        $param = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ];
        DB::table('users')->insert($param);
        return response()->json([
            'message' => 'userDataCreated!',
            'data' => $param
        ],200);
    }
}
