<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
  public function upload(Request $request)
  {
    // code...
    // $datetime_url = 日付
    $request->file('image')->move(public_path('images'), $datetime_url.'.jpg');
    // file_path
    return response()->json(['name' => '山田太郎', 'gender' => '男','mail' => 'yamada@test.com']);
  }
}
