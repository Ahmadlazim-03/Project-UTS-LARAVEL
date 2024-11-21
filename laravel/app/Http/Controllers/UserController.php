<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('datatable');
    }

    public function getUsers(Request $request)
    {
        $query = User::query();
        return DataTables::of($query)
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && $request->search['value']) {
                    $searchValue = $request->search['value'];
                    $query->where(function ($query) use ($searchValue) {
                        $query->where('name', 'like', "%{$searchValue}%")
                              ->orWhere('email', 'like', "%{$searchValue}%");
                    });
                }
            })
            ->orderColumn('created_at', '-created_at $1')
            ->make(true);
    }
}
