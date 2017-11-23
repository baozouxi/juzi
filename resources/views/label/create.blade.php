<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <title>发布标签</title>
</head>

<body>

<div id="form">


    <form method="post" action="{{ route('labels.store') }}">
        {!!  csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">标签名称：</label>
            <input type="text" required="required" name="content" class="form-control" id="exampleInputEmail1"
                   placeholder="输入您的标签">
        </div>

        <button type="submit" class="btn btn-default submit_right">发布</button>
    </form>
</div>
</body>

</html>