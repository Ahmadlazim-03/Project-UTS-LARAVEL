<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\JenisUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Menuadmin extends Component
{
    public $name,$email,$password,$ID_JENIS_USER;
    public $edit_name,$edit_email,$edit_password,$edit_ID_JENIS_USER
;    public function tambahuser(){
        $add = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => bcrypt($this->password),
            "ID_JENIS_USER" => $this->ID_JENIS_USER,
        ]);
    }
    public function edituser($id){
       $find = User::find($id);
       $find->name = $this->edit_name;
       $find->email = $this->edit_email;
       $find->password = bcrypt($this->edit_password);
       $find->ID_JENIS_USER = $this->edit_ID_JENIS_USER;
       $find->save();
    }
    public function render()
    {
        return view('livewire.menuadmin',[
            "data_user" => User::latest()->get(),
            "data_jenis_user" => JenisUser::all(),
        ]);
    }
}
