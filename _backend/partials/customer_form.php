<?php
if (!isset($customerid)) {
    $customerid = 0;
}
if ($customerid == 0 && isset($_GET['userid'])) {
    $customerid = Validate::strict_int($_GET['userid']);
} else if ($customerid == 0 && isset($_GET['id'])) {
    $customerid = Validate::strict_int($_GET['id']);
} else if ($customerid == 0 && isset($_POST['userid'])) {
    $customerid = Validate::strict_int($_POST['userid']);
} else if ($customerid == 0 && isset($_POST['id'])) {
    $customerid = Validate::strict_int($_POST['id']);
}
$Customer = new Customer($customerid);

$is_new = $Customer->id < 1;

function customer_value($key) {
    $Customer = Customer::$last;
    if(isset($Customer->db[$key]) && is_string($Customer->db[$key])) {
        return $Customer->db[$key];
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
<form data-ajax-form="../api/adm_customer_<?= $is_new ? 'create' : 'edit' ?>.php" class="form_basics form_customer" data-ajax-form-success="admin_forms_success" data-ajax-form-error="admin_forms_error">
    
    <?= $is_new ? '' : '<input type="hidden" name="id" value="' . $Customer->id . '" />' ?>
    
    <label class="row">
        <span class="row_label">
            Anrede
        </span>
        <span class="row_input">
            <select name="gender">
                <option value="m">Männlich</option>
                <option value="f">Weiblich</option>
                <option value="d">Divers</option>
            </select>
        </span>
    </label>
    <?= _row('firstname') ?>
    <?= _row('lastname') ?>
    <?= _row('email') ?>
    <?= _row('phone') ?>
    
    <label class="row">
        <span class="row_label">
            Banken
        </span>
        <span class="row_input">
            <input type="text" name="bank_iban" value="<?= customer_value('bank_iban') ?>" />
        </span>
    </label>
    
    <label class="row">
        <span class="row_label">
            Preismodel
        </span>
        <span class="row_input">
            <select name="paymodel">
                <option value="6-mon" <?= $Customer->db['paymodel'] == '6-mon' ? 'selected' : '' ?>>6 Monate</option>
                <option value="12-mon" <?= $Customer->db['paymodel'] == '12-mon' ? 'selected' : '' ?>>12 Monate</option>
            </select>
        </span>
    </label>
    
    <label class="row">
        <span class="row_label">
            Kurse
        </span>
        <span class="row_input">
            <select multiple name="courses">
                <option value="null">Kein kurs</option>
                <option value="course1">Kurs1</option>
                <option value="course2">Kurs2</option>
            </select>
        </span>
    </label>
    
    <div class="form_response"></div>
    <div class="row row_submit">
        <input type="submit" class="button" name="submit_x" value="<?= $Customer->id > 0 ? 'Kunde bearbeiten' : 'Kunde erstellen' ?>" />
    </div>
</form>