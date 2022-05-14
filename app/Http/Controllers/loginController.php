<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller

{
    public function login()
    {
        return view("LayoutLogin/login");
    }



    //auth login api
    public function auth(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (Auth::attempt($attr)) {
            return response()->json([
                'token' => auth()->user()->createToken('stocks')->plainTextToken,
                'success' => true,
                'message' => 'Login Berhasil!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 400);
        }
     }
    }
    // function auth(Request $request)
    // {


    //     $user= User::where('email', $request->email)->first();
    //     // print_r($data);
    //         if (!$user || !Hash::check($request->password, $user->password)) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => ['Login Gagal']
    //             ], 404);
    //         }

    //         $token = $user->createToken('my-app-token')->plainTextToken;

    //         $response = [
    //             'user' => $user,
    //             'token' => $token
    //         ];

    //         return response()->json([
    //             'success' => true
    //         ], 200);
    // }













    // public function check_login(Request $request)
    // {
    //     $user      = $request->input('email');
    //     $password   = $request->input('password');

    //     if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
    //         return response()->json([
    //             'success' => true
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Login Gagal!'
    //         ], 401);
    //     }

    // }

// }
