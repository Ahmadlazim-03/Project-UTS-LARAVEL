<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\SettingMenuUser;

class Manajemenmenu extends Component
{
    public $MENU_NAME, $MENU_ICON, $CLASS, $ISI_HTML;
    public $tambah_role = [];
    public $EDIT_MENU_NAME, $EDIT_MENU_ICON, $EDIT_CLASS;
    public $edit_tambah_role = [];
    public function tambahmenu(){
        $add = Menu::create([
            "ID_LEVEL" => 1,
            "MENU_NAME" => $this->MENU_NAME,
            "MENU_ICON" => $this->MENU_ICON,
            "CLASS" => $this->CLASS
        ]);
        $findlastid = Menu::latest('id')->first();
        foreach ($this->tambah_role as $role){
            SettingMenuUser::create([
                "ID_JENIS_USER" => $role,
                "ID_MENU" => $findlastid->id
            ]);
        }
        if ($add){
            $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
            $componentName = "$this->CLASS"; 
            shell_exec(command: "php {$projectPath}/artisan livewire:make {$componentName}");
            $componentPath = "{$projectPath}/resources/views/livewire/{$componentName}.blade.php";
                $htmlContent = <<<HTML
                <div>
                    {$this->ISI_HTML}
                </div>
                HTML;
            file_put_contents($componentPath, $htmlContent);
            $this->reset();
        }
    }
    public function editmenu($id){
        $find = Menu::find($id);
        $find->MENU_NAME = $this->EDIT_MENU_NAME;
        $find->MENU_ICON = $this->EDIT_MENU_ICON;
        $find->CLASS = $this->EDIT_CLASS;
        $find->save();
        SettingMenuUser::where('ID_MENU', $id)->delete();
        foreach ( $this->edit_tambah_role as $role ){
            SettingMenuUser::create([
                "ID_JENIS_USER" => $role,
                "ID_MENU" => $id
            ]);
        }
    }
    public function render()
    {
        return view('livewire.manajemenmenu',[
            'data_menu' => Menu::all()
        ]);
    }
}
