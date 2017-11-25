<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passage;
use App\Models\Label;

class PassagesController extends Controller
{

    public function show(Passage $passage)
    {
        $passage = $passage->load(['user', 'favors', 'comments']);

        //当前用户是否点赞  就是看当前句子点赞里面是否包含用户
        $user_id = session()->get('login_user')->id;

        $liked = false;

        $owner = false;

        //句子作者拥有删除评论的选项

        if ($passage->user_id == $user_id) {
            $owner = true;
        }

        $passage->favors->map(function($item) use(&$liked, $user_id){
            if ($item->user_id == $user_id) {
                $liked = true;
            }
        });

        return view('passage.show',compact('passage', 'liked', 'owner'));
    }


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
