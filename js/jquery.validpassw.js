(function ($) {
    jQuery.fn.validpassw = function () {
        var res;
        var tst = function () {
            if ($("#repeat_password").val() != "")
                if ($("#password").val() == $("#repeat_password").val())
                    $("#repeat_password").css("background-image", "url(images/ok.png)");
                else {
                    $("#repeat_password").css("background-image", "url(images/error.png)");
                    res = false;
                }
            else {
                $("#repeat_password").css("background-image", "none");
               res = false;
            }
        }


        if ($(this).val() != "") {
            var regexp = /(?!^[0-9]*$)(?!^[a-zA-Z!@#$%^&*()_+=<>?]*$)^([a-zA-Z!@#$%^&*()_+=<>?0-9]{6,})$/;
            if (regexp.test($(this).val())) {
                $(this).css("background-image", "url(images/ok.png)");
                $("#baloon-pass").css("visibility", "hidden");
                res = true;
            } else {
                $(this).css("background-image", "url(images/error.png)");
                $("#baloon-pass").css("visibility", "visible");
                res = false;
            }
            tst();
        }
        else {
            $(this).css("background-image", "none");
            $("#baloon-pass").css("visibility", "hidden");
            res = false;
            tst();
        }

        return res;
    };
})(jQuery);

