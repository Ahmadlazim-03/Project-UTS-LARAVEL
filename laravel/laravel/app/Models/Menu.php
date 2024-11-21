<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['MENU_ID'];
    public function RelationMenu(){
        return $this->belongsTo(Menu::class, 'PARENT_ID', 'id');
    }
}
