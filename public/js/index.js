$(function(){


    var clipboard = new Clipboard('.copy_btn');
    
    clipboard.on('success', function(e){
        console.log(e);
        document.getElementById('copyCode').innerHTML = '复制成功';
    });
    clipboard.on('error', function(e){
        document.getElementById('copyCode').innerHTML = '复制失败，请长按复制';
    });

})