$(function(){

    var clipboard = new Clipboard('.copy_btn');
    clipboard.on('success', function(e){
        console.log(e);
    });
    clipboard.on('error', function(e){
    });

})