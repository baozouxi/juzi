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
        $(this).addClass('menu_active');

        $.post('/favors', {passage_id:id}).done().fail(function(xhr){
            console.log(xhr.status);
        });

    });




});