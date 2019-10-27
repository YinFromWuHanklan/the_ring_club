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
<form data-ajax-form="../api/adm_customer_<?= $is_new ? 'create' : 'edit' ?>.php" class="form_basics form_customer">
    <?= _row('name') ?>
    <?= _row('email') ?>
    <div class="row row_submit">
        <input type="submit" class="button" name="submit_x" value="<?= $Customer->id > 0 ? 'Kunde bearbeiten' : 'Kunde erstellen' ?>" />
    </div>
</form>