<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passage;
use App\Models\Comment;

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

        if ($comment = Comment::create($request->all())) {

            return redirect()->back();
        }

      return redirect()->back();
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
    }

}
