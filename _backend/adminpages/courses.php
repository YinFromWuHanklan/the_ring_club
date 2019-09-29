<?php
$courses = Xjsondb::select('courses');
?>
<h1>Kurse</h1>

<?= File::instance(DIR_BACKEND . 'partials/courses_table.php')->get_content() ?>

<div class="button_create" data-popup="api/adm_course.php?mode=create">Neuen Kurs erstellen</div>
