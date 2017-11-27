$(function(){


    var submited = false;

    $('.comment_btn').click(function(event) {
        $('#commentInput').slideToggle();
    });


    $('.comment_store').click(function () {
        if (!submited) {
            $(this).parents('form').submit();
            submited = true;
        }

    });


    $('.comment_delete_btn').click(function(){
        var id = $(this).attr('data-comment_id');
        var _method  = 'DELETE';
        if (confirm('确认删除评论吗')) {
            $(this).parents('.comment_item').remove();
            $.post('/comments/'+id, {_method:_method}, null, 'json');
        }

    });

});