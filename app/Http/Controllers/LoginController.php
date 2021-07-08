<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request) {
        $request->validate([
          'username' => 'required',
          'password' => 'required'
        ]);
        

        $credentials = request(['username', 'password']);        
        //kondisi test negatif / jika dta yg di input salah
        if (!Auth::attempt($credentials)) {
            return response(['message' => 'fail']);
        }else{
        //kondisi test positif / jika data yg di input benar
        return response([
            'message' => 'success',
            'data' => [
            'username' => Auth::user()->username,
            'hobby' =>  Auth::user()->hobby,
            ]
        ]);
           
        }
       
      }
}
