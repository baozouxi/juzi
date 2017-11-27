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

        dd($admin);

    }
}

