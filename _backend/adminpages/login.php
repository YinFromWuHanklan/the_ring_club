<?php
if (isset($_POST['password'])) {
    if ($_POST['password'] == 'trc' . date('d')) {
        $_SESSION['trc']['login'] = true;
    }
}
if (Admin::is_logged_in()) {
    Utilities::redirect('index');
}
?>
<div class="page_login">
    <form action="" method="post" class="form_login">
        <input type="text" name="password" />
        <button type="submit">Login</button>
    </form>
</div>