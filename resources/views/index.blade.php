<div class="test-area">
    <input class="taokouling" value="sadasx" type="text">
    <button id="copyCode" class="btn" data-clipboard-target=".taokouling" data-clipboard-action="copy">
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