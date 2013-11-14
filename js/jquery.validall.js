(function ($) {
    jQuery.fn.validall = function () {
        var chk = false;
        var make = function () {
           chk = $("#email").validmail() & $("#password").validpassw() & $("#nick").validnick();
            if (chk)
            {
                $("#send").attr("type","submit");
                $("#send").attr("onclick","");
            }
            else
            {
                $("#send").attr("type","button");
                $("#send").attr("onclick","alert('please fill all the fields');");
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
        $("#nick")
            .keyup(function () {
                make();
            })
            .blur(function () {
                make();
            })

        return true;
    };
})(jQuery);

