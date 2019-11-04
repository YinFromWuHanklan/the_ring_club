setTimeout(function () {
    $(function () {
        setTimeout(init, 5);
    });
}, 5);

function init() {
    $('[data-popup]').click(function () {
        popup_by_url($(this).data('popup'));
    });
    $('.customer_table tr[data-id]').click(function() {
        var customer_id = $(this).data('id');
        location.href = BASEURL + 'admin/customer?id=' + customer_id;
    });
    $('.courses_table tr[data-id]').click(function() {
        var course_id = $(this).data('id');
        location.href = BASEURL + 'admin/course?id=' + course_id;
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
    $close.click(function () {
        $all.fadeOut(500, function () {
            $(this).remove();
        });
    });
    //
    setTimeout(function () {
        $all.fadeIn(750);
    }, 10);
}

function admin_forms_success(response, $form) {
    return false; 
    setTimeout('location.reload(true)', 3000);
    var userid = response[0];
    var responsetext = response[1];
    $form.find('.form_response').addClass('success').html(responsetext);
}

function admin_forms_error(errors, $form) {
    var errors_text = [];
    $(errors).each(function (index, item) {
        console.log(item);
        $form.find('[name="' + item[0] + '"]').closest('.row').addClass('error').click(function () {
            $(this).removeClass('error');
        });
        errors_text.push(item[1]);
    });
    $form.find('.form_response').addClass('error').html(errors_text.join('<br>'));
}
