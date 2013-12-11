(function ($) {
    jQuery.fn.validnick = function () {

        var res = false;
        if ($(this).val() != "") {
            if ($(this).val().length <= 25) {


                $.when($.ajax({
                        url: "getuser.php?username=" + encodeURI($(this).val()),
                        caching: false,

                        dataType: "xml"}))
                    .then(function (xmlResponse) {
                        var re = $("result", xmlResponse).map(function () {
                            return {
                                taken: $("taken", this).text(),
                            };
                        }).get();
                        if (re[0].taken == "true") {
                            $("#nick").css("background-image", "url(images/error.png)");
                            $("#inuse-nick").css("visibility", "visible");
                            nickok = false;
                            $("#send").attr("onclick", "alert('please fill all the fields');");

                        }
                        else {
                            $("#nick").css("background-image", "url(images/ok.png)");
                            $("#baloon-nick").css("visibility", "hidden");
                            $("#inuse-nick").css("visibility", "hidden");
                            nickok = true;
                            var chk1 = $("#email").validmail() & $("#password").validpassw();
                            if (chk1) {
                                $("#send").attr("type", "submit");
                                $("#send").attr("onclick", "");
                            }
                            else {
                                $("#send").attr("type", "button");
                                $("#send").attr("onclick", "alert('please fill all the fields');");
                            }


                        }
                    }
                )
            }
            else {
                $(this).css("background-image", "url(images/error.png)");
                $("#baloon-nick").css("visibility", "visible");
                res = false;
            }
        }
        else {
            $(this).css("background-image", "none");
            $("#baloon-nick").css("visibility", "hidden");
            res = false;
        }


        return res;

    };
})(jQuery);

