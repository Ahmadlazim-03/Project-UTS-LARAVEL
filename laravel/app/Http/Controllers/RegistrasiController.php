<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegistrasiController extends Controller
{
    public function registrasi(Request $request){
        $credentials = $request->validate([
            "name" => ['required'],
            "email" => ['required','email:dns'],
            "password" => ['required','min:5'],
        ]);
        $create = User::create($credentials);

        if($create){
            return response()->json(['redirect' => '/login']);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
