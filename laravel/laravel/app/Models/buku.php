<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;

class buku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function relationkategori(){
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
}
