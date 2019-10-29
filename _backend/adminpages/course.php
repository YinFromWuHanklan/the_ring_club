<?php
$Course = new Course(_var('id', $_GET));
$id = $Course->id;
?>
<h1><?= $Course->db['name'] ?></h1>

<script>var COURSE_ID = <?= $id ?>;</script>
<div class="course_id"><?= $id ?></div>
<div class="button course_edit" data-popup="api/adm_course.php?courseid=<?= $id ?>">Bearbeiten</div>
