<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostingKomentar;

class PostingKomenController extends Controller
{
    public function tambahlikekomen(Request $request){
        $find = PostingKomentar::find($request->postId);
        $find->LIKE++;
        $find->save();
    }
    public function kuranglikekomen(Request $request){
        $find = PostingKomentar::find($request->postId);
        $find->LIKE++;
        $find->save();
    }
    public function tambahdislikekomen(Request $request){
        $find = PostingKomentar::find($request->postId);
        $find->DISLIKE++;
        $find->save();
    }
    public function kurangdislikekomen(Request $request){
        $find = PostingKomentar::find($request->postId);
        $find->DISLIKE++;
        $find->save();
    }
}
