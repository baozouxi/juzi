<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>我</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/com.css') }}">
    <link rel="stylesheet" href="{{ asset('css/me.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="{{ asset('js/font-size.js') }}"></script>
</head>

<body>
<div id="user_info">
    <div class="wrap">
        <div class="headImg fl"><img src="{{ $user->avatar }}" alt=""></div>
        <div class="nick_text fl">
            <div class="nickname">{{ $user->nickname }}</div>
            <div class="fav">
                <span>发布 {{ $user->passages->count() }}</span>
                <span style="margin-left: 0.1rem;">点赞 {{ $favors_count }}</span>
            </div>
        </div>
    </div>
</div>
<div id="article_list">
    @foreach($passages as $passage)
        <div class="article_item">
            <div class="item_wrap">
                <h1>《{{ $passage->from }}》-- {{ $passage->author }}</h1>
                <div class="a_span">
                    @if($passage->labels->isEmpty())
                        <span style="background: rgb(76,76,76)">无标签</span>
                    @else
                        @foreach($passage->labels as $label)
                            <span>{{ $label->content }}</span>
                        @endforeach
                    @endif

                </div>
                <div class="content cp_con_{{ $passage->id }}">{{ $passage->content }}
                </div>

                <div class="article_btn tr">

                    <span class="{{ $status == 'like' ? 'liked menu_active' :'' }}"   data-passage_id="{{ $passage->id }}><i class="iconfont">&#xe600;</i>{{ $passage->favors->count() }}</span>
                    <a href="{{ route('passages.show', ['id'=>$passage->id]) }}"><span><i
                                    class="iconfont">&#xe624;</i>{{ $passage->comments->count() }}</span></a>
                    <button class="copy_btn" data-clipboard-action="copy" data-clipboard-target=".cp_con_{{ $passage->id }}"><i class="iconfont">&#xe6ea;</i>复制</button>

                </div>
            </div>
        </div>
    @endforeach

</div>

<footer>
    <span><a href="/">今句首页</a></span>
    <span class="{{ $status != 'publish' ?:  'active' }}"><a href="{{ route('me',['status'=>'publish']) }}">我发布的</a></span>
    <span class="{{ $status != 'like' ?:  'active' }}"><a href="{{ route('me', ['status'=>'like']) }}">我点赞的</a></span>
</footer>
</body>

</html>