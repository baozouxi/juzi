<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $passages = Passage::where('checked', '1')->withCount(['comments', 'favors'])->with(['user'])->get();



        return view('index', compact('passages'));
    }


    public function me()
    {
        $user = session('wechat.oauth_user');
        return view('me')->with(['user'=>$user]);
    }
}
