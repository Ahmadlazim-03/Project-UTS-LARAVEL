<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JenisUser;

class Manajemenrole extends Component
{
    public $tambah_role, $edit_role;
    public function tambahrole(){
        JenisUser::create([
            "JENIS_USER" => $this->tambah_role
        ]);
    }
    public function editrole($id){
        $find = JenisUser::find($id);
        $find->JENIS_USER = $this->edit_role;
        $find->save();
    }
    public function render()
    {
        return view('livewire.manajemenrole',[
            "data_role" => JenisUser::all()
        ]);
    }
}
