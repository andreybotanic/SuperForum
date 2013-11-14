(function ($) {
    jQuery.fn.validmail = function () {

        if ($("#email").val() != "") {
            var regexp = /.@./;
            if (regexp.test($("#email").val())) {
                $("#email").css("background-image", "url(images/ok.png)");
                return true;
            }
            else {
                $("#email").css("background-image", "url(images/error.png)");
                return false;
            }
        }
        else {
            $("#email").css("background-image", "none");
            return false;
        }


    };
})(jQuery);

