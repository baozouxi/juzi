@extends($admin_layout)


@section('title', '句子管理')

@section('body')
    <table id="passages" lay-filter="test"></table>
    <script type="text/html" id="barDemo">
        @if(Request::query('checked') == '0')
        <a class="layui-btn layui-btn-mini" lay-event="check">过审</a>
        @endif

        <a class="layui-btn layui-btn-mini" lay-event="update_label">编辑标签</a>
        <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    </script>
@endsection




@push('scripts')
    <script>
        layui.use('table', function () {
            var table = layui.table;

            //展示已知数据
            table.render({
                elem: '#passages'
                , data: {!! $passages !!}
                , cols: [[ //标题栏
                    {checkbox: true, LAY_CHECKED: false} //默认全选
                    , {field: 'id', title: 'ID', sort: true}
                    , {field: 'content', title: '内容', width: 800, edit: 'text'}
                    , {field: 'from', title: '出处', width: 300,  edit: 'text'}
                    , {field: 'labels_arr', title: '标签', width: 300}
                    , {field: 'author', sort: true, title: '原作者', width: 150}
                    , {field: 'add_user', sort: true, title: '发布者', width: 150}
                    , {field: 'created_at', sort: true, title: '发布时间', width: 150}
                    , {fixed: 'right', width: 150, align: 'center', toolbar: '#barDemo'}
                ]]
//                , skin: 'line' //表格风格
                , even: true
                , page: true //是否显示分页
                , limits: [10, 15, 20]
                , limit: 20 //每页默认显示的数量
            });


            //工具条事件处理
            table.on('tool(test)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
                var data = obj.data; //获得当前行数据
                var layEvent = obj.event; //获得 lay-event 对应的值
                var tr = obj.tr; //获得当前行 tr 的DOM对象

                if (layEvent === 'check') { //

                    data._method = "PUT";
                    data.checked = '1';
                    $.post('/admin/passages/' + data.id + '/check', null, null, 'json').done(function (data) {

                        if (data.status == 'ok') {
                            obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                            return;
                        }

                        alert('过审失败，请稍后重试');

                    }).fail();
                    //do somehing
                } else if (layEvent === 'del') { //删除

                    layer.confirm('确定删除该条句子吗？', function (index) {
                        data._method = 'DELETE';
                        $.post('/admin/passages/' + data.id, data, null, 'json').done(function (data) {
                            if (data.status == 'ok') {
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                layer.close(index);
                                return;
                            }
                            alert(data.status);

                        }).fail(function (xhr) {
                            alert(xhr.status);
                        });

                        //向服务端发送删除指令
                    });
                }else if(layEvent === 'update_label') {
                    $.get('/admin/labels/'+data.id,{}, function(str){
                        layer.open({
                            type: 1,
                            area: ['500px', '300px'],
                            content: str //注意，如果str是object，那么需要字符拼接。
                        });
                    });

                }
            });


            table.on('edit(test)', function(obj){
                var value = obj.value //得到修改后的值
                    ,data = obj.data //得到所在行所有键值
                    ,method = 'PATCH'
                    ,field = obj.field; //得到字段

                var put_data = {_method:method};
                put_data[field] = value;

                $.post('/admin/passages/'+data.id ,put_data, null, 'json').done(function(data){
                    if (data.status == 'ok') {
                        layer.msg('修改成功');
                    }
                }).fail(function(xhr){
                    layer.msg('修改失败');
                });


            });


        });
    </script>
@endpush