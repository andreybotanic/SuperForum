(function ($) {
    jQuery.fn.validmail = function () {
		var tst = function () {
			if ($("#email").val() != "") {
                var regexp = /.@./;
                if (regexp.test($("#email").val()))
                    $("#email").css("background-image", "url(images/ok.png)");
                else
                    $("#email").css("background-image", "url(images/error.png)");
            }
            else
                $("#email").css("background-image", "none");
		}
        var make = function () {
            $(this)
                .keyup(function () {
                    tst();
                })
			$(this)
				.blur(function () {
					tst();
				})
        };
        return this.each(make);
    };
})(jQuery);

