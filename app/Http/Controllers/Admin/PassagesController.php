<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Passage;

class PassagesController extends Controller
{
    public function index(Request $request)
    {
        $passages = new Passage();
        if ($request->has('checked')) {
            $passages = $passages->where('checked', (int)$request->input('checked'));
        }
        $passages = $passages->with('user', 'labels')->get();
        $passages->map(function ($item) {
            $item['add_user'] = $item->user->name;
            $labels = [];
            $item->labels()->each(function ($lable) use (&$labels) {
                $labels[] = $lable->content;
            });
            $item['labels_arr'] = implode('、', $labels);
        });


        return view('passage.list', compact('passages'));

    }


    //过审  管理员用
    public function check(int $id)
    {
        $status = 'fail';
        if ((new Passage())->check($id)) {
            $status = 'ok';
        }

        return json_encode(compact('status'));

    }


    public function delete($id)
    {
        $passage = Passage::findOrFail($id);
        $passage->delete();
        return json_encode(['status'=>'ok']);
    }
}
