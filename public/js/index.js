$(function(){


    $('body').on('click', '.like', function(event) {
        event.preventDefault();
        $(this).addClass('menu_active');
    });

})