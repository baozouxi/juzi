<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>今日句子</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/com.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/index.css')  }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="{{ asset('js/font-size.js') }}"></script>
</head>

<body>
<header>
    @foreach($labels as $label)
        <span><a href="{{ route('index', ['label'=> $label->id]) }}">{{ $label->content }}</a></span>
    @endforeach
</header>
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

                    <span class=" {{ $passage->liked ? 'liked menu_active' : 'like' }} "
                          data-passage_id="{{ $passage->id }}"><i
                                class="iconfont">&#xe600;</i>{{ $passage->favors_count }}</span>
                    <a href="{{ route('passages.show', ['id'=>$passage->id]) }}"><span><i
                                    class="iconfont">&#xe624;</i>{{ $passage->comments_count }}</span></a>
                    <button class="copy_btn" data-clipboard-action="copy" data-clipboard-target=".cp_con_{{ $passage->id }}"><i class="iconfont">&#xe6ea;</i>复制</button>

                </div>
            </div>
        </div>
    @endforeach
</div>

<footer>

    <a href="/"> <span class="menu_active">
            <p class="iconfont logo"><i></i></p>
            <p class="bottom">今句</p>
        </span></a>
    <a href="{{ route('passages.create') }}"> <span>
            <p class="iconfont">&#xe601;</p>
            <p class="bottom">发布句子</p>
        </span></a>
{{--    <a href="{{ route('labels.create') }}"> <span>
            <p class="iconfont">&#xe601;</p>
            <p>发布标签</p>
        </span></a>--}}
    <a href="{{ route('me') }}"><span>
            <p class="iconfont">&#xe740;</p>
            <p class="bottom">我</p>
        </span></a>

</footer>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="{{ asset('js/com.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
</body>

</html>