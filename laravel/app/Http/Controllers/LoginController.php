<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email:dns'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $find = User::find(Auth()->user()->id);
        $find->STATUS_USER = "online";
        $find->save();
        $request->session()->regenerate();
        return response()->json(['redirect' => '/dashboard']);
    }
    
    return response()->json(['error' => 'Invalid credentials'], 401);
}
}
