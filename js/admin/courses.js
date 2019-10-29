setInterval(init_coursetimes, 333);
function init_coursetimes() {
    $('[data-course-times]:not([data-initiated])').attr('data-initiated', '').each(function () {
        coursetimes(this);
    });
}

function coursetimes(root) {
    var $root = $(root);
    var current = $root.data('course-times');
    if (current === null || typeof current != 'object') {
        current = [];
    }
    var row_counter = 0;
    var $wrap = $('<div class="coursetimes_wrap" />');
    var $add_row = $('<div class="coursetimes_add button">Reihe hinzufügen</div>');
    //
    $root.append($wrap);
    $root.append($add_row);
    $wrap.append(create_course_row());
    //
    $add_row.click(function () {
        $wrap.append(create_course_row());
    });
    //
    function create_course_row() {
        var $row = $('<div class="coursetimes_row" />');
        $row.append('<div class="coursetimes_row_day"><input type="text" name="times[' + row_counter + '][day]" value="" placeholder="Montag" /></div>');
        $row.append('<div class="coursetimes_row_time"><input type="text" name="times[' + row_counter + '][time]" value="" placeholder="17:00-19:00" /></div>');
        $row.append('<div class="coursetimes_row_order"><input type="text" name="times[' + row_counter + '][order]" value="0" placeholder="0" /></div>');
        row_counter++;
        return $row;
    }
}
