<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>句子</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <span class="{{ !$liked ? 'like' : 'liked menu_active'  }}" data-passage_id="{{ $passage->id }}"><i
                    class="iconfont">&#xe600;</i>{{ $passage->favors()->count() }}</span>
        <span><i class="iconfont">&#xe624;</i>{{ $passage->comments()->count() }}</span>
        <button class="copy_btn" data-clipboard-action="copy" data-clipboard-target=".content"><i class="iconfont">&#xe6ea;</i>复制
        </button>
    </div>
    <div id="comment">
        <div class="likes">
            <i class="iconfont">&#xe600;</i>
            <ul>
                @foreach($passage->favors as $favor)
                    <li><img src="{{ $favor->user->avatar  }}" alt=""></li>
                @endforeach
            </ul>
        </div>
        <div class="comment_list">
            @foreach($passage->comments as $comment)
                <div class="comment_item">
                    <i class="iconfont">&#xe606;</i>
                    <div class="headImg"><img src="{{ $comment->user->avatar }}" alt=""></div>
                    <div class="comment_content">
                        <div class="nickname">
                            {{ $comment->user->nickname }}
                            <span class="fr date">{{ $comment->created_at->format('Y-m-d') }}</span>
                        </div>
                        <div class="text">
                            {{ $comment->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{--评论框--}}
<div id="commentInput"  style="display: {{ $errors->any() ? 'block' : 'none'}}" >
    <form action="{{ route('comments.store') }}" method="POST">
        <input type="hidden" value="{{ csrf_token()  }}" name="_token">
        <input type="hidden" name="passage_id" value="{{ $passage->id }}">
        <input type="text" name="content" class="fl" placeholder="请输入评论内容..." value="{{ old('content') }}">
        <span class="fl comment_store">发表</span>
    </form>
</div>


<footer>
    <a href="/"><span>
            <p class="iconfont logo"><i></i></p>
            <p>金句</p>
        </span></a>
    <span class="comment_btn">
            <p class="iconfont">&#xe601;</p>
            <p>发布评论</p>
        </span>
    <a href="{{ route('me') }}"><span>
            <p class="iconfont">&#xe740;</p>
            <p>我</p>
        </span></a>
</footer>


<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/com.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/comment.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@if($errors->isNotEmpty())

    <script>
        alert('{{ $errors->all()[0] }}')
    </script>

@endif


</body>

</html>