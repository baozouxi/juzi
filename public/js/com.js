$(function(){
    //csrf-token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('body').on('click', '.like', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-passage_id');
        $(this).addClass('menu_active').removeClass('like');
        $.post('/favors', {passage_id:id}).done().fail(function(xhr){
            console.log(xhr.status);
        });

    });

    //取消点赞
    $('body').on('click', '.liked', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-passage_id');
        var _method = 'DELETE';
        $(this).addClass('like').removeClass('liked,menu_active');
        $.post('/favors/'+id, {_method:_method,passage_id:id}).done().fail(function(xhr){
            console.log(xhr.status);
        });

    });


});