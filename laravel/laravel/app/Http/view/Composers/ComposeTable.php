<?php

namespace App\Http\View\Composers;

use App\Models\buku;
use App\Models\Menu;
use App\Models\User;
use App\Models\Posting;
use App\Models\kategori;
use App\Models\JenisUser;
use Illuminate\View\View;
use App\Models\SettingMenuUser;

class ComposeTable
{
    protected $data_menu;
    protected $data_user;
    protected $data_setting_menu_user;
    protected $data_kategori;
    protected $data_buku;
    protected $jenis_user;
    protected $data_posting;


    public function __construct()
    {
        $this->data_menu = Menu::all();
        $this->jenis_user = JenisUser::all();
        $this->data_setting_menu_user = SettingMenuUser::latest()->get();
        $this->data_kategori = kategori::all();
        $this->data_buku = buku::all();
        $this->data_user = User::all();
        $this->data_posting = Posting::all();
    }

    public function compose(View $view)
    {
        $view->with('all_menu', $this->data_menu);
        $view->with('all_jenis_user', $this->jenis_user);
        $view->with('all_setting_menu_user', $this->data_setting_menu_user);
        $view->with('data_kategori', $this->data_kategori);
        $view->with('data_buku', $this->data_buku);
        $view->with('all_data_user', $this->data_user);
        $view->with('all_data_posting', $this->data_posting);
    }
}
