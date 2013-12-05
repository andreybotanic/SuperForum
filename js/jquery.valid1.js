(function ($) {
    jQuery.fn.valid1 = function () {


        if ($(this).val() != "") {
            if ($(this).val().length <= 25) {
                $(this).css("background-image", "url(images/ok.png)");
                $("#baloon-nick").css("visibility", "hidden");
                return true;
            }
            else {
                $(this).css("background-image", "url(images/error.png)");
                $("#baloon-nick").css("visibility", "visible");
                return false;
            }
        }
        else {
            $(this).css("background-image", "none");
            $("#baloon-nick").css("visibility", "hidden");
            return false;
        }

    };
})(jQuery);