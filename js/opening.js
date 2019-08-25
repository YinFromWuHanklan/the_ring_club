
function opening_countdown() {
    var selector = '#countdownOpening';
    if ($("#countdownOpening").length) {
        var countDownDate = new Date("Oct 1, 2019 10:00:00").getTime();

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

function opening_form_ajax_success(response) {
    console.log('success', response);
}

function opening_form_ajax_error(errors) {
    console.log('error', errors);
}
