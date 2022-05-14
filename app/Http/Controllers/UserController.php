<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   
//log out account
public function logout(Request $request)
{
    auth()->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout Berhasil!'
        ], 201);
}
//   public function logout(Request $request) {
//     $user = $request->user();
//     $user->currentAccessToken()->delete();
//     $respon = [
//         'status' => 'success',
//         'msg' => 'Logout successfully',
//         'errors' => null,
//         'content' => null,
//     ];
//     return response()->json($respon, 200);
// }

// public function logoutall(Request $request) {
//     $user = $request->user();
//     $user->tokens()->delete();
//     $respon = [
//         'status' => 'success',
//         'msg' => 'Logout successfully',
//         'errors' => null,
//         'content' => null,
//     ];
//     return response()->json($respon, 200);
// }

}
