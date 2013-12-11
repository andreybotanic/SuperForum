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
        var makenick = function () {
            $("#nick").validnick();

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
        $("#nick")
            .keyup(function () {
                makenick();
         })
            .blur(function () {
                makenick();
            })

        return true;
    };
})(jQuery);

