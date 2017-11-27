<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '后台管理') }} __ @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">

</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">

        <div class="layui-logo">金句后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    {{ session('admin_name') }}
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:void(0);" class="update_password">修改密码</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="{{ route('logout') }}">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">句子管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ route('adminP', ['checked'=>1]) }}">已审核</a></dd>
                        <dd><a href="{{ route('adminP', ['checked'=>0]) }}">待审核</a></dd>

                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">标签管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ route('adminL', ['checked'=>1]) }}">已审核</a></dd>
                        <dd><a href="{{ route('adminL', ['checked'=>0]) }}">待审核</a></dd>

                    </dl>
                </li>



                <li class="layui-nav-item">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{ route('users.index', ['is_use' => 1]) }}">正常用户</a></dd>
                        <dd><a href="{{ route('users.index', ['is_use' => 0]) }}">冻结用户</a></dd>
                    </dl>
                </li>

            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->

        @yield('body')

    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="{{ asset('layui/layui.js') }}"></script>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });

    layui.use('layer', function(){
        var layer = layui.layer;

        $('.update_password').click(function(){
            layer.open({
                title: '修改密码'
                type: 1,
                area:['500px', '350px'],
                content: '<form action="{{route(\'adminUpdate\', [\'admin_id\'=>session(\'admin_id\')])}}">\n' +
                '                    <label for="">请输入密码</label><input type="password" value="">\n' +
                '                </form>' //这里content是一个普通的String

            });
        });

    });

</script>


    @stack('scripts')


</body>
</html>