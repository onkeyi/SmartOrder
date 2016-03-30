(function ($) {
    var mainApp = {
        main: function () {
            /*====================================
             METIS MENU
             ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
             LOAD APPROPRIATE MENU BAR
             ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            $("a").click(function () {
                $("a.active-menu").removeClass("active-menu");
                $(this).addClass("active-menu");
            });

            $('a').click(function (event) {
                var href = $(this).attr('href');
                if (href.indexOf('#') === 0) return;
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('href')
                    ,beforeSend:function(){
                        $('#page-wrapper').html('<div id="loading-view" />');
                    }
                    , success: function (response) {
                        $('#page-wrapper').html(response);
                    }
                });
                return false;
            });

            $("#page-wrapper").on('click', 'a', function (event) {
                var href = $(this).attr('href');
                if (href.indexOf('#') === 0) return;
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('href')
                    ,beforeSend:function(){
                        $('#page-wrapper').html('<div id="loading-view" />');
                    }
                    , success: function (response) {
                        $('#page-wrapper').html(response);
                    }
                })
            });
        },
    };

    $(document).ready(function () {
        mainApp.main();

    });

}(jQuery));

function logout() {
    $.post("/admin/api/logout", {action:'logout'}).done(function (data) {
        location.reload(true);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log('ERROR', jqXHR, textStatus, errorThrown);
        location.reload(true);
    });
}