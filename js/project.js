setTimeout(function () {
    $(function () {
        setTimeout(project_init, 20);
    });
}, 50);
//
function project_init() {

    setTimeout(opening_countdown, 10);

}

function opening_countdown() {
    var selector = '#countdownOpening';
    if ($("#countdownOpening").length) {
        var countDownDate = new Date("Oct 1, 2019 10:00:00").getTime();
        setInterval(function () {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $("#countdownOpening").text(days + "d " + hours + "h " + minutes + "m " + seconds + "s");

        }, 1000);
    }
}
