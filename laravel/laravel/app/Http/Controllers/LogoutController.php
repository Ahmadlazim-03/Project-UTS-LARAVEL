<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
 

class LogoutController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        $find = User::find(Auth()->user()->id);
        $find->STATUS_USER = "offline";
        $find->save();
        Auth::logout();
        return redirect(to: '/login');
    }
}
