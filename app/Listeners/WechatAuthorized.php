<?php

namespace App\Listeners;

use Overtrue\LaravelWechat\Events\WeChatUserAuthorized;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WechatAuthorized
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WeChatUserAuthorized $event
     * @return void
     */
    public function handle(WeChatUserAuthorized $event)
    {

        $user = $event->getUser();

        dd($user);
        $union_id = $user->getId();
        $login_user = \App\Models\User::firstOrCreate(['union_id' => $union_id], $user->toArray());
        session()->put('login_user', $login_user);
    }
}
