<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use Illuminate\Http\Request;

class FavorsController extends Controller
{


    public function store(Request $request)
    {
        $passage = Passage::findOrFail($request->passage_id);

        $user_id = session()->get('login_user')->id;

        $passage->favors()->create(['user_id'=>$user_id]);


    }

}
