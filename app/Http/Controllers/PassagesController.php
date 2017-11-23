<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passage;

class PassagesController extends Controller
{


    public function create()
    {
        $labels = Label::where('checked', 1)->get();

        return view('passage.create', compact('labels'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'author' => 'required',
            'from' => 'required',
            'spans' => 'array|min:1'
        ], [
            'content.required' => '请输入金句内容',
            'author.required' => '请输入金句内容',
            'from.required' => '请输入金句内容',
        ]);

        $request['user_id'] = session()->get('login_user')->id;


        if ($passage = Passage::create($request->all())) {

            //添加标签模型关系
            if ($request->has('spans')) {
                //简单处理下 labelID
                $temp_id_arr = [];
                foreach ($request->spans as $span) {
                    $temp_id_arr[] = Label::find($span);
                }
                $passage->labels()->saveMany($temp_id_arr);
            }


            return view('check');
        }

        return '发布失败';
    }

    public function update()
    {

    }

    public function edit()
    {

    }

}
