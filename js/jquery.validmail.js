(function ($) {
    jQuery.fn.validmail = function () {
        var make = function () {
            $(this)
                .keyup(function () {
                    if ($(this).val() != "") {
                        var regexp = /.@./;
                        if (regexp.test($(this).val()))
                            $(this).css("background-image", "url(images/ok.png)");
                         else
                            $(this).css("background-image", "url(images/error.png)");
                    }
                    else
                        $(this).css("background-image", "none");
                })
        };
        return this.each(make);
    };
})(jQuery);

