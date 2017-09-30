$(document).ready(function(){
    // flag = false;
    $(window).scroll(function () {
        
        if ($(this).scrollTop() > 0) {
            $('.scroller').fadeIn();
        } else {
            $('.scroller').fadeOut();
        }

        if ($(this).scrollTop() > 155) {
            $('#menu-scroller').fadeIn();

        } else {
            if($("ul#navbar-scroller").css("left") > "-80px"){
                $('ul#navbar-scroller').animate({ left: '-=80', }, 500, function() {
                    $("ul#navbar-scroller").css("left", "-80px");
                });
            }
            $('#menu-scroller').fadeOut();
        }
    });

    $('#scrollUp').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });

    $('#menu-scroller').click(function () {

        $positionMenu = $("ul#navbar-scroller").css("left");

        if($positionMenu == "-80px"){
            $('ul#navbar-scroller').animate({ left: '+=80', }, 500, function() { 
                $("ul#navbar-scroller").css("left", "0px");
            });
        } else if($positionMenu == "0px") {
            $('ul#navbar-scroller').animate({ left: '-=80', }, 500, function() { 
                $("ul#navbar-scroller").css("left", "-80px");
            });
        }

        return false;

    });
});