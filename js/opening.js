
function opening_countdown() {
    var selector = '#countdownOpening';
    if ($("#countdownOpening").length) {
        var countDownDate = new Date("Nov 18, 2019 00:01:00").getTime();

        setInterval(_create_countdown_time, 1000);
        _create_countdown_time();

        function _create_countdown_time() {
            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $("#countdownOpening").text(days + "d " + hours + "h " + minutes + "m " + seconds + "s");
        }
    }
}

function opening_form_ajax_success(response, $form) {
    $form.html('<div class="alert-success">' + response + '</div>');
}

function opening_form_ajax_error(errors, $form) {
    var error_text, error_texts = [];
    $(errors).each(function () {
        if (this.length >= 2) {
            var input_name = this[0];
            error_texts.push(this[1]);
            $form.find('[name="' + input_name + '"]').addClass('alert-danger').on('change click', function () {
                $(this).removeClass('alert-danger');
            });
        }
    });
    error_text = error_texts.join("\n");
    alert(error_text);
}
