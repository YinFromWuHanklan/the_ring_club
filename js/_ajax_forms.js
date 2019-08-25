window.startup_functions = window.startup_functions || [];

function ajax_forms(selector) {
    $(selector).each(function () {
        if (typeof this.tagName == 'string' && this.tagName.toLowerCase() == 'form') {
            ajax_form(this);
        }
    });
}

function ajax_form(form) {
    if (typeof form.tagName == 'string' && form.tagName.toLowerCase() == 'form') {
        var $form = $(form);
        var target = $form.data('ajax-form');
        var success = $form.data('ajax-form-success');
        var error = $form.data('ajax-form-error');
        $form.submit(function (e) {
            e.preventDefault();
            console.log('form submitted', $form, target);
            $.postJSON(target, $form.serialize(), function (response) {
                if (response.ok) {
                    window[success](response.response);
                } else {
                    window[error](response.errors);
                }
            });
            return false;
        });
    }
}

window.startup_functions.push(function () {
    ajax_forms('form[data-ajax-form]')
});
