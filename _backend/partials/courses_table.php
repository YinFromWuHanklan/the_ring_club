<table class="admintable">
    <thead>
        <tr>
            <td>ID</td>
            <td>Datum</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Xjsondb::select('courses') as $course) { ?>
            <tr>
                <td>#<?= $course['id'] ?></td>
                <td><?= date('H:i d.m.Y', $course['insert_date']) ?></td>
                <td><?= $course['name'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
