<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeleteUserController extends Controller
{
    public function deleteuser(Request $request){
       $find = User::find($request->userId)->delete();
    }
}
