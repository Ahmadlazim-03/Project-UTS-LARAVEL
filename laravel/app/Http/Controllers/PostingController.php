<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;

class PostingController extends Controller
{
    public function tambahlike(Request $request){
        $find = Posting::find($request->postId);
        $find->LIKE++;
        $find->save();
    }
    public function kuranglike(Request $request){
        $find = Posting::find($request->postId);
        $find->LIKE--;
        $find->save();
    }
    public function tambahdislike(Request $request){
        $find = Posting::find($request->postId);
        $find->DISLIKE++;
        $find->save();
    }
    public function kurangdislike(Request $request){
        $find = Posting::find($request->postId);
        $find->DISLIKE--;
        $find->save();
    }
}
