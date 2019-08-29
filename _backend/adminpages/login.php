<?php
if(isset($_POST['password'])) {
    if($_POST['password'] == 'trc' . date('d')) {
        debug('Password correct.');
    }
}
?>
<form action="" method="post">
    <input type="text" name="password" />
    <button type="submit">Login</button>
</form>