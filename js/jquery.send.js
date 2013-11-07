(function ($) {
    jQuery.fn.send = function (a) {
        var make = function () {
            $(this)
                .click(function () {
                    $("#last").after(
                      "<div class=\"post\"> \
                        <div class=\"bgr\"> \
                            <div class=\"postheader\"> \
                                <div class=\"headertext\"> \
                                </div> \
                            </div> \
                            </div> \
                        <div class=\"postbody npostbody\"> \
                        <form action=\"send.php\" method = \"post\">\
                            <textarea type=\"text\" name = \"msg\" class=\"lab ptxt nptxt\" placeholder=\"Текст сообщения\"></textarea> \
                            <input type = hidden name = \"topic\" value = "+a+">\
                            <input type=\"submit\" value=\"Отправить\" class=\"button bb\">\
                        </form>\
                            </div>\
                        </div>"
                    );
                    $("#sendbtn").css("visibility", "hidden");
                })
        };
        return this.each(make);
    };
})(jQuery);

