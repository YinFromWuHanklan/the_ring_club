<?php
if (!isset($courseid)) {
    $courseid = 0;
}
if ($courseid == 0 && isset($_GET['courseid'])) {
    $courseid = Validate::strict_int($_GET['courseid']);
} else if ($courseid == 0 && isset($_GET['id'])) {
    $courseid = Validate::strict_int($_GET['id']);
} else if ($courseid == 0 && isset($_POST['courseid'])) {
    $courseid = Validate::strict_int($_POST['courseid']);
} else if ($courseid == 0 && isset($_POST['id'])) {
    $courseid = Validate::strict_int($_POST['id']);
}
$Course = new Course($courseid);

$is_new = $Course->id < 1;

function customer_value($key) {
    $Course = Course::$last;
    if(isset($Course->db[$key]) && is_string($Course->db[$key])) {
        return $Course->db[$key];
    } else {
        return '';
    }
}

function _row($name, $type = 'text') {
    ob_start();
    ?>
    <label class="row">
        <span class="row_label">
            <?= ucfirst($name) ?>
        </span>
        <span class="row_input">
            <input type="<?= $type ?>" name="<?= $name ?>" value="<?= customer_value($name) ?>" />
        </span>
    </label>
    <?php
    return ob_get_clean();
}
?>
<form data-ajax-form="../api/adm_course_<?= $is_new ? 'create' : 'edit' ?>.php" class="form_basics form_course" data-ajax-form-success="admin_forms_success" data-ajax-form-error="admin_forms_error">
    
    <?= $is_new ? '' : '<input type="hidden" name="id" value="' . $Course->id . '" />' ?>
    
    <?= _row('name') ?>
    
    <div data-course-times="<?= json_encode($Course->db['times']) ?>"></div>
    
    <div class="form_response"></div>
    <div class="row row_submit">
        <input type="submit" class="button" name="submit_x" value="<?= $Course->id > 0 ? 'Kurs bearbeiten' : 'Kurs erstellen' ?>" />
    </div>
</form>