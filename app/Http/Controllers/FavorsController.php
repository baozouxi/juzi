<?php

namespace App\Http\Controllers;

use App\Models\Favor;
use App\Models\Passage;
use Illuminate\Http\Request;

class FavorsController extends Controller
{


    public function store(Request $request)
    {
        $passage = Passage::findOrFail($request->passage_id);

        $user_id = session()->get('login_user')->id;

        $passage = $passage->load('favors');
        //判断是否点赞 防止多次点赞
        foreach ($passage->favors as $favor) {
            if ($favor->user_id == $user_id) {
                return;
            }
        }

        $passage->favors()->create(['user_id'=>$user_id]);

    }



    public function destroy($id)
    {
        $user_id = session()->get('login_user')->id;
        $favor = Favor::where('user_id',$user_id)->where('passage_id', (int)$id)->first();

        $favor->delete();
    }



}
