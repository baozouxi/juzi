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
                <span>发布 120</span>
                <span style="margin-left: 0.1rem;">收藏 120</span>
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
                <span>创业艰难</span>
            </div>
            <div class="content">{{ $passage->content }}
            </div>
        </div>
    </div>
    @endforeach

</div>

<footer>
    <span><a href="/">今句首页</a></span>
    <span class="active"><a href="{{ route('me',['status'=>'publish']) }}">我发布的</a></span>
    <span><a href="{{ route('me', ['status'=>'like']) }}">我点赞的</a></span>
</footer>
</body>

</html>