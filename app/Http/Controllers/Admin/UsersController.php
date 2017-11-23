<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $users  = new User();
        if ($request->has('is_use')) {
            $users = $users->where('is_use', (int)$request->input('is_use'));
        }

        $users = $users->withCount(['passages'=>function($query){
            $query->where('checked', '1');
        }])->get();
        return view('admin.user.list', compact('users'));
    }
}
