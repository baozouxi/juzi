<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>句子</title>
    <link rel="stylesheet" href="{{ asset('css/com.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="{{ asset('js/font-size.js') }}"></script>
</head>

<body>
<div id="wrap">
    <div id="author" class="hidden">
        <div class="headImg fl">
            <img src="{{ $passage->user->avatar }}" alt="">
        </div>
        <div class="nickname fl">{{ $passage->user->nickname }}</div>
    </div>
    <article>
        <h1>《{{ $passage->from }}》</h1>
        <h2>{{ $passage->author }}</h2>
        <div class="content">
            {{ $passage->content }}
        </div>
    </article>
    <div class="buttons">
        <span class=" {{ !$liked ?: 'menu_active'  }} "><i class="iconfont">&#xe600;</i>{{ $passage->favors()->count() }}</span>
        <span><i class="iconfont">&#xe624;</i>{{ $passage->comments()->count() }}</span>
        <span><i class="iconfont">&#xe6ea;</i>复制</span>
    </div>
    <div id="comment">
        <div class="likes">
            <i class="iconfont">&#xe600;</i>
            <ul>
                @foreach($passage->favors as $favor)
                    <li><img src="{{ $favor->user->avator  }}" alt=""></li>
                @endforeach
            </ul>
        </div>
        <div class="comment_list">
            <div class="comment_item">
                <i class="iconfont">&#xe606;</i>
                <div class="headImg"><img src="http://qlogo4.store.qq.com/qzone/253120625/253120625/100" alt=""></div>
                <div class="comment_content">
                    <div class="nickname">
                        新中发赵兵
                        <span class="fr date">昨天: 18:11</span>
                    </div>
                    <div class="text">
                        撒豆is建档立卡数据的克
                    </div>
                </div>
            </div>
            <div class="comment_item">
                <i class="iconfont">&#xe606;</i>
                <div class="headImg"><img src="http://qlogo4.store.qq.com/qzone/253120625/253120625/100" alt=""></div>
                <div class="comment_content">
                    <div class="nickname">
                        新中发赵兵
                        <span class="fr date">昨天: 18:11</span>
                    </div>
                    <div class="text">
                        撒豆is建档立卡数据的克
                    </div>
                </div>
            </div>
            <div class="comment_item">
                <i class="iconfont">&#xe606;</i>
                <div class="headImg"><img src="http://qlogo4.store.qq.com/qzone/253120625/253120625/100" alt=""></div>
                <div class="comment_content">
                    <div class="nickname">
                        新中发赵兵
                        <span class="fr date">昨天: 18:11</span>
                    </div>
                    <div class="text">
                        撒豆is建档立卡数据的克
                    </div>
                </div>
            </div>
            <div class="comment_item">
                <i class="iconfont">&#xe606;</i>
                <div class="headImg"><img src="http://qlogo4.store.qq.com/qzone/253120625/253120625/100" alt=""></div>
                <div class="comment_content">
                    <div class="nickname">
                        新中发赵兵
                        <span class="fr date">昨天: 18:11</span>
                    </div>
                    <div class="text">
                        撒豆is建档立卡数据的克
                    </div>
                </div>
            </div>
            <div class="comment_item">
                <i class="iconfont">&#xe606;</i>
                <div class="headImg"><img src="http://qlogo4.store.qq.com/qzone/253120625/253120625/100" alt=""></div>
                <div class="comment_content">
                    <div class="nickname">
                        新中发赵兵
                        <span class="fr date">昨天: 18:11</span>
                    </div>
                    <div class="text">
                        撒豆is建档立卡数据的克
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
        <span>
            <p class="iconfont logo"><i></i></p>
            <p>金句</p>
        </span>
    <span>
            <p class="iconfont">&#xe601;</p>
            <p>发布评论</p>
        </span>
    <span>
            <p class="iconfont">&#xe740;</p>
            <p>我</p>
        </span>
</footer>
</body>

</html>