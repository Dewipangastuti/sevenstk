<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller

{
    public function register()
    {
        return view("LayoutLogin/register");
    }
 //register new account by api
 public function reg(Request $request)
 {
     $attr = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|unique:users,email',
         'password' => 'required|string|min:6'
     ]);

     $user = User::create([
         'name' => $attr['name'],
         'email' => $attr['email'],
         'password' => bcrypt($attr['password'])
     ]);

     if($user) {
        return response()->json([
            'success' => true,
            'token' => $user->createToken('stocks')->plainTextToken,
            'message' => 'Register Berhasil!'
        ], 201);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Register Gagal!'
        ], 400);
    }  
  }
}