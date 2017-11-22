<?php

namespace App\Listeners;

use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Overtrue\LaravelWechat\Events\WeChatUserAuthorized;

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
     * 微信授权成功事件
     * @param  object  $event
     * @return void
     */
    public function handle(WeChatUserAuthorized $event)
    {
        $user = $event->getUser();

        $union_id = $user->getId();

        $login_user = \App\Models\User::firstOrCreate(['union_id'=>$union_id], $user->toArray());

        session()->put('login_user', $login_user);

    }
}
