$(document).ready(function(){

    $(document).on('submit', '#question-add-form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            success: function(res){
                res.replace(new RegExp("/logopedist_site/web/index.php?r=messege%2Fsubmit_question&page=",'g'),"/logopedist_site/web/index.php?r=messege%2Findex&page=")
                $('#questions-messege').html (res);
                $('input#messege-name').val("");
                $('input#messege-email').val("");
                $('textarea#messege-messege').val("");
                $('button.feedback-add.btn[data-target="#question-add-form"]').click();                
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


    $('a.id-answer').click(function() {
        // id = 
        $('input#messege-linkmessegeid').val($(this).attr('name'));
        // alert (id);
        // return false;
    });

    $('#questions-messege').on('hidden.bs.collapse', function () {
        // alert("sfssddf");
        $('#questions-messege-span').html('Показать сообщения пользователей');
    })
    $('#questions-messege').on('shown.bs.collapse', function () {
        // alert("sfssddf");
        $('#questions-messege-span').html('Скрыть сообщения пользователей');
    })


});