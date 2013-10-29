(function ($) {
    jQuery.fn.send = function () {
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
                            <textarea type=\"text\" class=\"lab ptxt nptxt\" placeholder=\"Текст сообщения\"></textarea> \
                            <input type=\"submit\" value=\"Отправить\" class=\"button bb\">\
                            </div>\
                        </div>"
                    );
                    $("#sendbtn").css("visibility", "hidden");
                })
        };
        return this.each(make);
    };
})(jQuery);

