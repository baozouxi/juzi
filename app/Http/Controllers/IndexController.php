<?php

namespace App\Http\Controllers;

use App\Models\Favor;
use App\Models\Label;
use App\Models\Passage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $passage = new Passage();

        if ($request->has('label')) {
            $label_id = (int)$request->input('label');
            $passage = $passage->whereHas('labels', function ($query) use ($label_id) {
                $query->where('label_id', '=', $label_id);
            });
        }

        $passages = $passage->where('checked', '1')->withCount(['comments', 'favors'])->with(['user'])->orderBy('created_at', 'desc')->get();

        $labels = Label::all();

        $cur_user_id = session()->get('login_user')->id;

        //处理点赞  遍历文章下的点赞  和当前用户id做对比

        foreach ($passages as $passage) {
            $passage['liked'] = false;
            foreach ($passage->favors as $favor) {
                if ($favor->user_id == $cur_user_id) {
                    $passage['liked'] = true;
                }
            }
        }
        return view('index', compact('passages', 'labels'));
    }

    //我
    public function me(Request $request)
    {
        $user = session('login_user');
        $user = $user->load([
            'passages' => function ($query) {
                $query->where('checked', '1');
            }
        ]);
        $status = $request->has('status') ? $request->input('status') : 'publish';


        $favors = Favor::where('user_id', $user->id)->whereHas('passage')->get(); // 我点赞的

        switch ($status) {
            case 'publish':
                $passages = $user->passages;
                break;

            case 'like':
                $passages = new Collection();
                foreach ($favors as $favor) {
                    if ($favor->passage->checked == 1) {
                        $passages->add($favor->passage);
                    }
                }
                break;

            default:

                break;
        }


        return view('me')->with([
            'user' => $user,
            'passages' => $passages,
            'favors_count' => $favors->count(),
            'status' => $status
        ]);
    }
}
