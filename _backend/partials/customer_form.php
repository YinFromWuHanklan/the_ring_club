<?php
if (!isset($userid)) {
    $userid = 0;
}
if ($userid == 0 && isset($_GET['userid'])) {
    $userid = Validate::strict_int($_GET['userid']);
} else if ($userid == 0 && isset($_GET['id'])) {
    $userid = Validate::strict_int($_GET['id']);
} else if ($userid == 0 && isset($_POST['userid'])) {
    $userid = Validate::strict_int($_POST['userid']);
} else if ($userid == 0 && isset($_POST['id'])) {
    $userid = Validate::strict_int($_POST['id']);
}
?>
<form class="form_customer">
    <label class="row">
        <span class="row_label">

        </span>
        <span class="row_input">

        </span>
    </label>
    <label class="row">
        <span class="row_label">

        </span>
        <span class="row_input">

        </span>
    </label>
    <label class="row">
        <span class="row_label">

        </span>
        <span class="row_input">

        </span>
    </label>
</form>