<?php

namespace App\Livewire;

use App\Models\Posting;
use Livewire\Component;
use App\Models\PostingKomentar;
use Illuminate\Support\Facades\Auth;

class Socialfeed extends Component
{
    public $TEXT,$GAMBAR;
    public $KOMEN_TEXT, $KOMEN_GAMBAR;
    public function tambahpostingan(){
        Posting::create([
            "PENULIS" => Auth::user()->name,
            "TEXT" => $this->TEXT,
            "GAMBAR" => $this->GAMBAR,
        ]);
    }
    public function balaspostingan($id){
        PostingKomentar::create([
            "ID_POSTING" => $id,
            "PENULIS" => Auth::user()->name,
            "TEXT" => $this->KOMEN_TEXT,
            "GAMBAR" => ""
        ]);
    }
    public function render()
    {
        return view('livewire.socialfeed',[
            "data_posting" => Posting::latest()->get(),
            "data_komentar" => PostingKomentar::latest()->get(),
        ]);
    }
}
