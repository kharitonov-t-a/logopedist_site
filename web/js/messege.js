$(document).ready(function(){

    $(document).on('submit', '#question-add-form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            success: function(res){
                $('#questions-messege').html (res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });

    $(document).on('submit', '#answer-add-form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            success: function(res){
                $('#questions-messege').html (res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });


});