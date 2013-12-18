(function ($) {
    jQuery.fn.send = function (a, page) {

        $(this)
            .click(function () {
                $("#last").after("<div class=\"post\" id = \"sndpst\"> \
                      <div class=\"bgr\"> \
                          <div class=\"postheader\"> \
                              <div class=\"headertext\"> \
                              </div> \
                          </div> \
                          </div> \
                      <div class=\"postbody npostbody\"> \
                      <!--<form action=\"send.php\" method = \"post\">-->\
                          <textarea type=\"text\"  id = \"msg\" name = \"msg\" class=\"lab ptxt nptxt\" placeholder=\"Текст сообщения\"></textarea> \
                        <input type=\"button\" id = \"snd\" value=\"Отправить\" class=\"button bb\">\
                        </div>\
                    </div>"
                );
                var mk = function () {
                    $.when($.ajax({
                            type: "POST",
                            url: "send.php",
                            data: {topic: a, msg: $("#msg").val(), page: page},
                            caching: false,
                            dataType: "text",
                        }))
                        .then(function (response) {
                            if (response.contains('yes')) {


                                $.when($.ajax({
                                        type: "GET",
                                        url: "getlastmsg.php",
                                        data: {topic: a},
                                        caching: false,
                                        dataType: "xml",
                                    }))
                                    .then(function (xmlResponse) {
                                        var re = $("post", xmlResponse).map(function () {
                                            return {
                                                text: $("text", this).text(),
                                                creator: $("creator", this).text(),
                                                date: $("date", this).text(),
                                                num: $("num", this).text(),
                                                avatar: $("avatar", this).text(),
                                            };
                                        }).get();
                                        re = re[0];
                                        $("#lastmsg").after(
                                            "<div class=\"post\">\
                                        <div class=\"bgr\">\
                                        <div class=\"postheader\">\
                                        <div class=\"headertext\">\
                                        <div class=\"time\">" +
                                                re.date +
                                                "</div>\
                                                <div class=\"postlink\">" +
                                                "#" + re.num +
                                                "</div>\
                                                </div>\
                                                </div>\
                                                </div>\
                                                <div class=\"postbody\">\
                                                <div class=\"userbox\">\
                                                <div class=\"userinfo\">\
                                                <a href=\"\" class=\"link\">\
                                                <img src=\"images/" +
                                                re.avatar +
                                                "\">\
                                        <div class=\"image-info\">" +
                                                re.creator +
                                                "</div>\
                                                </a>\
                                                </div>\
                                                </div>\
                                                <div class=\"message\">" +
                                                re.text +
                                                "</div>\
                                                <div class=\"postbar\"></div>\
                                                </div>\
                                                </div>"
                                        );

                                    });


                                $("#sndpst").remove();
                                $("#last").after();
                                $("#sendbtn").css("visibility", "visible");
                            }
                            else
                            {
                                 var pg = parseInt(response);
                                window.location.replace("viewtopic.php?topic="+a+"&page=" +pg);
                            }
                        });
                };
                $('#snd').on('click', function () {
                    mk();
                });
                $("#sendbtn").css("visibility", "hidden");
            })


    };
})(jQuery);

