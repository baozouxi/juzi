<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request)
    {
        $passage = Passage::findOrFail($request->input('passage_id'));

        $this->validate($request, [
            'content' => 'required|string|min:10'
        ], [
            'content.required' => '请输入评论内容',
            'content.min' => '最少10个字符'
        ]);


        $request['user_id'] = session()->get('login_user')->id;
        $request['passage_id'] = $passage->id;

        if (Comment::create($request->all())) {
            return json_encode(['status' => 'ok']);
        }

        return json_encode(['status' => 'error']);
    }

}
