setTimeout(function () {
    window.xtreme_observe_html_change_functions.push(start_xcaptcha);
}, 50);
function start_xcaptcha() {
    $('[data-xcaptcha]:not([data-xcaptcha-started])').attr('data-xcaptcha-started', '').each(function () {
        var $container = $(this);
        $.getJSON('api/captcha.php?mode=start', function (response) {
            if (response.status && response.status == 200 && response.response) {
                response = response.response;
                if (response.safe) {
                    $container.html(response.html);
                } else if (response.html) {
                    $container.html(response.html);
                }
                $container.find('input').on('keypress', function (e) {
                    if (e.which == 13) {
                        _submit_answer();
                    }
                });
                $container.find('.xcaptcha_submit').click(_submit_answer);
                //
                function _submit_answer() {
                    var $math_input = $container.find('div.xcaptcha_math input');
                    var answer = null;
                    if ($math_input.length) {
                        //Math-Question
                        answer = $math_input.val();
                    } else {
                        //Images
                        answer = $('div.xcaptcha_answer input').val();
                    }
                    //
                    $.postJSON('api/captcha.php?mode=answer', {
                        answer: answer
                    }, function (response) {
                        if (response.status && response.status == 200 && response.response) {
                            response = response.response;
                            if (response.ok) {
                                $container.find('.xcaptcha').html('<div class="xcaptcha_ok">Captcha OK</div>');
                                $container.after('<input type="hidden" name="xcaptcha" value="true" />');
                                setTimeout(function () {
                                    $container.fadeOut(500, function () {
                                        $(this).remove();
                                    });
                                }, 3000);
                            } else {
                                __answer_fail();
                            }
                        } else {
                            __answer_fail();
                        }
                        //
                        function __answer_fail() {
                            $container.find('input').css('background-color', 'rgba(255, 0, 0, 0.25)').on('focus change', function () {
                                $(this).css('background-color', '');
                            });
                        }
                    });
                }
            }
        });
    });
}

//
if (typeof window.xtreme_observe_html_change != 'function') {
    window.xtreme_observe_html_change_functions = [];
    window.xtreme_observe_html_change_prevhtml = null;
    window.xtreme_observe_html_change = function () {
        if (window.xtreme_observe_html_change_prevhtml != document.body.innerHTML) {
            setTimeout(function () {
                for (var i = 0; i < window.xtreme_observe_html_change_functions.length; i++) {
                    window.xtreme_observe_html_change_functions[i]();
                }
                window.xtreme_observe_html_change_prevhtml = document.body.innerHTML;
            }, 100);
            setTimeout(window.xtreme_observe_html_change, 500);
        } else {
            setTimeout(window.xtreme_observe_html_change, 250);
        }
    }
    setTimeout(window.xtreme_observe_html_change, 250);
}
