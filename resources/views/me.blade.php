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
    <div class="article_item">
        <div class="item_wrap">
            <h1>《腾讯传》-- 吴晓波</h1>
            <div class="a_span">
                <span>创业艰难</span>
            </div>
            <div class="content">“他之所以糟糕，不是因为技术上不承受，而是它违背了一条非常简单却不易被察觉的竞争原则：在一个缺乏成长性的行业里，任何创新都很难获得等值的回报，因而是没有意义的！
            </div>
        </div>
    </div>
    <div class="article_item">
        <div class="item_wrap">
            <h1>《腾讯传》-- 吴晓波</h1>
            <div class="a_span">
                <span>创业艰难</span>
            </div>
            <div class="content">“他之所以糟糕，不是因为技术上不承受，而是它违背了一条非常简单却不易被察觉的竞争原则：在一个缺乏成长性的行业里，任何创新都很难获得等值的回报，因而是没有意义的！
            </div>
        </div>
    </div>
    <div class="article_item">
        <div class="item_wrap">
            <h1>《腾讯传》-- 吴晓波</h1>
            <div class="a_span">
                <span>创业艰难</span>
            </div>
            <div class="content">“他之所以糟糕，不是因为技术上不承受，而是它违背了一条非常简单却不易被察觉的竞争原则：在一个缺乏成长性的行业里，任何创新都很难获得等值的回报，因而是没有意义的！
            </div>
        </div>
    </div>
    <div class="article_item">
        <div class="item_wrap">
            <h1>《腾讯传》-- 吴晓波</h1>
            <div class="a_span">
                <span>创业艰难</span>
            </div>
            <div class="content">“他之所以糟糕，不是因为技术上不承受，而是它违背了一条非常简单却不易被察觉的竞争原则：在一个缺乏成长性的行业里，任何创新都很难获得等值的回报，因而是没有意义的！
            </div>
        </div>
    </div>
    <div class="article_item">
        <div class="item_wrap">
            <h1>《腾讯传》-- 吴晓波</h1>
            <div class="a_span">
                <span>创业艰难</span>
            </div>
            <div class="content">“他之所以糟糕，不是因为技术上不承受，而是它违背了一条非常简单却不易被察觉的竞争原则：在一个缺乏成长性的行业里，任何创新都很难获得等值的回报，因而是没有意义的！
            </div>
        </div>
    </div>
    <div class="article_item">
        <div class="item_wrap">
            <h1>《腾讯传》-- 吴晓波</h1>
            <div class="a_span">
                <span>创业艰难</span>
            </div>
            <div class="content">“他之所以糟糕，不是因为技术上不承受，而是它违背了一条非常简单却不易被察觉的竞争原则：在一个缺乏成长性的行业里，任何创新都很难获得等值的回报，因而是没有意义的！
            </div>
        </div>
    </div>
</div>

<footer>
    <span><a href="/">首页</a></span>
    <span class="active">我发布的</span>
    <span>我收藏的</span>
</footer>
</body>

</html>