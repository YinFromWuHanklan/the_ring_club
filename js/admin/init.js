setTimeout(function () {
    $(function () {
        setTimeout(init, 5);
    });
}, 5);

function init() {
    $('[data-popup]').click(function () {
        var url = $(this).data('popup');
        if (url.search('http://') != -1 || url.search('https://') != -1) {
            //
        } else {
            if (url.search('admin/') != -1) {
                url = url.replace('admin/', '');
            }
            url = BASEURL + url;
        }
        if (url) {
            $.get(url, function (popup_content) {
                console.log(popup_content);
            });
        }
    });
}
