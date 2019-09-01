<?php
include '../components/html_top.php';


foreach(Xjsondb::select('trials') as $trial) {
    ?>
<div>
    <div><?= date('H:i:s d.m.Y', $trial['insert_date']) ?></div>
    <div><?= $trial['name'] ?></div>
    <div><?= $trial['email'] ?></div>
    <div><?= $trial['phone'] ?></div>
    <div>#<?= $trial['id'] ?></div>
</div>
<?php
}