<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingMenuUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function RelationMenu(){
        return $this->belongsTo(Menu::class, 'ID_MENU','id');
    }
}
