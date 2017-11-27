<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    public function update(Request $request, $admin)
    {
        $admin = Admin::findOrFail($admin);
        $password = $request->input('password');
        $admin->password = sha1($password);

        if ($admin->save()) {
            return redirect(route('logout'));
        }

        return '删除失败';

    }
}

