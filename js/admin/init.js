setTimeout(function () {
    $(function () {
        setTimeout(init, 5);
    });
}, 5);

function init() {
    $('[data-popup]').click(function () {
        popup_by_url($(this).data('popup'));
    });
}

function popup_by_url(url) {
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
            popup(popup_content);
        });
    }
}

function popup(popup_content) {
    var $veil = $('<div class="popup_veil"></div>');
    var $wrap = $('<div class="popup_wrap"></div>');
    var $all = $wrap.add($veil);
    //
    $all.hide();
    $wrap.html(popup_content);
    //
    $('body').append($all);
    var $close = $wrap.find('.popup_close');
    $close.click(function() {
        $all.fadeOut(500, function() {
            $(this).remove();
        });
    });
    //
    setTimeout(function () {
        $all.fadeIn(750);
    }, 10);
}
