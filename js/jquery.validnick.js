(function ($) {
    jQuery.fn.validnick = function () {
        var make = function () {
            $(this)
                .keyup(function () {
                    if ($(this).val() != "") {
                        if ($(this).val().length <= 25){
                            $(this).css("background-image", "url(images/ok.png)");
                            $("#baloon-nick").css("visibility", "hidden");
                        }
                         else
                        {
                            $(this).css("background-image", "url(images/error.png)");
                            $("#baloon-nick").css("visibility", "visible");
                        }
                    }
                    else{
                        $(this).css("background-image", "none");
                        $("#baloon-nick").css("visibility", "hidden");
                    }
                })
        };
        return this.each(make);
    };
})(jQuery);

