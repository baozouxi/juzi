$(function(){

    var clipboard = new Clipboard('.copy_btn');

    clipboard.on('success', function(e){
        alert('复制成功');
    });
    clipboard.on('error', function(e){
        alert('复制失败');
    });



})