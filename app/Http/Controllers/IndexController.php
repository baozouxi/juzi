<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $passages = Passage::where('checked', '1')->withCount(['comments', 'favors'])->with(['user'])->get();

        $cur_user_id = session()->get('login_user')->id;

        //处理点赞  遍历文章下的点赞  和当前用户id做对比

        foreach ($passages as $passage) {
            foreach ($passage->favors as $favor) {
                if ($favor->user_id == $cur_user_id) {
                    $passage['liked'] = true;
                }else{
                    $passage['liked'] = false;
                }
            }
        }

        return view('index', compact('passages'));
    }

    //我
    public function me(Request $request)
    {
        $user = session('login_user');
        $status = $request->has('status') ? $request->input('status')  : 'publish';

        switch ($status) {
            case 'publish':
                $passages = $user->passages;
                break;

            case 'like':
                $passages = new Collection();

                foreach ($user->favors as $favor) {
                    if ($favor->passage !== null) {
                        $passages->add($favor->passage);
                    }

                }
                break;

            default:

                break;
        }

    
        

        return view('me')->with(['user'=>$user, 'passages'=>$passages, 'status'=>$status]);
    }
}
