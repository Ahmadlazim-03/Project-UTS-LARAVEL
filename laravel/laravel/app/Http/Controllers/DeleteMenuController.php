<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\SettingMenuUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class DeleteMenuController extends Controller
{
    public function deletemenu(Request $request){
        $find = Menu::find($request->menuId);
        $find->delete();
        SettingMenuUser::where('ID_MENU', $request->menuId)->delete();
        // $filePath = public_path("C:\PROJECT_UTS_LARAVEL\laravel\resources\views\livewire\$find->CLASS.blade.php");
        // File::delete($filePath);
    }
}
