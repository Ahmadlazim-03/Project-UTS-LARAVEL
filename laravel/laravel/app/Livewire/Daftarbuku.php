<?php

namespace App\Livewire;

use App\Models\buku;
use Livewire\Component;

class Daftarbuku extends Component
{
    public $judul_buku, $pengarang, $deskripsi, $isi_buku;
    public function tambahbuku(){
        buku::create([
            "judul" => $this->judul_buku,
            "pengarang" => $this->pengarang,
            "deskripsi" => $this->deskripsi,
            "isi_buku" => $this->isi_buku
        ]);
    }
    public function render()
    {
        return view('livewire.daftarbuku',[
            "data_buku" => buku::all()
        ]);
    }
}
