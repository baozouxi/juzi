<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabelsController extends Controller
{

    public function create()
    {
        return view('label.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|string|',
        ], [
            'content.required' => '请输入标签'
        ]);

        $request['user_id'] = Auth::user()->id;

        if (Label::create($request->all())) {
            return view('check');
        }

        return '发布失败';

    }
}
