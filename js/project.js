window.startup_functions = window.startup_functions || [];

setTimeout(function () {
    $(function () {
        setTimeout(project_init, 5);
    });
}, 5);
window.music = document.getElementById('background_music');
//
function project_init() {

    setTimeout(function() {
        opening_countdown();
        //
        window.music.play();
    }, 1);
    
    //Execute startup functions from other scripts
    setTimeout(function() {
        for(var i in window.startup_functions) {
            if(typeof window.startup_functions[i] == 'function') {
                window.startup_functions[i]();
            }
        }
        //
        start_xcaptcha();
    }, 100);

}

//Enhancement of jQuery
if (typeof $ == 'object' || typeof $ == 'function') {
    $.postJSON = function (url, data, callback) {
        $.ajax({
            url: url,
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: callback
        });
    };
}