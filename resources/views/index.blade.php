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
<div class="test-area">
    <input id="taokouling" value="{{code}}" type="text">
    <button id="copyCode" class="btn" data-clipboard-target="#taokouling" data-clipboard-action="copy">
        复制淘口令
    </button>
    <script type="text/javascript" src="http://www.fndroid.cn/clipboard.min.js"></script>
    <script>
        var clipboard = new Clipboard('.btn');
        clipboard.on('success', function(e){
            console.log(e);
            document.getElementById('copyCode').innerHTML = '复制成功';
        });
        clipboard.on('error', function(e){
            document.getElementById('copyCode').innerHTML = '复制失败，请长按复制';
        });
    </script>
</div>

</body>

</html>