(function ($) {
    jQuery.fn.validall = function () {

        var chk = false;
        var make = function () {
            chk = $("#email").validmail() & $("#password").validpassw() & nickok;
            if (chk) {
                $("#send").attr("type", "submit");
                $("#send").attr("onclick", "");
            }
            else {
                $("#send").attr("type", "button");
                $("#send").attr("onclick", "alert('please fill all the fields');");
            }
        };
        make();
        $("#email")
            .keyup(function () {
                make();
            })
            .blur(function () {
                make();
            })
        $("#password")
            .keyup(function () {
                make();
            })
            .blur(function () {
                make();
            })
        $("#repeat_password")
            .keyup(function () {
                make();
            })
            .blur(function () {
                make();
            })


        $("#nick").typing({
            start: function (event, $elem) {
                nickok = false;
                $("#send").attr("type", "button");
                $("#send").attr("onclick", "alert('please fill all the fields');");
                $("#nick").css("background-image", "url(images/loading.gif)");
            },
            stop: function (event, $elem) {
                $("#nick").validnick();
            },
            delay: 700
        });
        return true;
    };
})(jQuery);

