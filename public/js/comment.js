$(function(){

    $('.comment_btn').click(function(event) {
        $('#commentInput').slideToggle();
    });


    $('.comment_store').click(function () {
        $(this).parents('form').submit();
    });

});