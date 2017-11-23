<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use Illuminate\Http\Request;

class FavorsController extends Controller
{


    public function store(Request $request)
    {
        $passage = Passage::findOrFail($request->passage_id);

        $user = session()->get('login_user');
        $user = $user->load('favors');


        //判断是否点赞 防止多次点赞
        foreach ($user->favors as $favor) {
            if ($favor->user_id == $user->id) {
                return;
            }
        }
        $passage->favors()->create(['user_id'=>$user->id]);

    }



}
