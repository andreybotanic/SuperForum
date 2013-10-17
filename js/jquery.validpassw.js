(function ($) {
    jQuery.fn.validpassw = function () {
        var make = function () {
            $(this)
                .keyup(function () {
                    if ($(this).val() != "") {
                        $("#passwpic").css("visibility", "visible");
                        var regexp = /(?!^[0-9]*$)(?!^[a-zA-Z!@#$%^&*()_+=<>?]*$)^([a-zA-Z!@#$%^&*()_+=<>?0-9]{6,})$/
                        if (regexp.test($(this).val())) {
                            $("#password").css("background-image", "url(images/ok.png)");
                            $("#baloon").css("visibility", "hidden");
                        } else {
                            $("#password").css("background-image", "url(images/error.png)");
                            $("#baloon").css("visibility", "visible");
                        }
                    }
                    else {
                        $("#password").css("background-image", "none");
                        $("#baloon").css("visibility", "hidden");
                    }
                })
        };
        return this.each(make);
    };
})(jQuery);

