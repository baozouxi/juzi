<?php

namespace App\Http\Controllers\Admin;

use App\Models\Passage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Label;

class LabelsController extends Controller
{
    public function index(Request $request)
    {
        $labels = New Label();

        if ($request->has('checked')) {
            $labels = $labels->where('checked', (int)$request->input('checked'));
        }

        $labels = $labels->with('user')->get();

        $labels->map(function ($item) {
            $item['author'] = $item->user->name;
        });


        $labels = $labels->toJson();
        return view('admin.label.list', compact('labels'));
    }


    public function check(int $id)
    {
        $status = 'error';
        if ((new Label())->check($id)) {
            $status = 'ok';
        }
        return json_encode(compact('status'));
    }

    public function delete($id)
    {
        $label = Label::findOrFail($id);
        $label->delete();
        return json_encode(['status' => 'ok']);

    }

    public function get($id)
    {

        $passage = Passage::findOrFail($id);

        $p_labels = $passage->labels;

        $labels = Label::all();

        $str = '<div>';
        foreach ($labels as $label) {
            
            $str .= '<label>' . $label->content . '</label><input  type="checkbox" name="labels" value="' . $label->id . '">';

        }

        $str .= '<p>修改</p></div>';

        return $str;

    }


}
