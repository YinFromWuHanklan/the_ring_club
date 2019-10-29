<table class="admintable courses_table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Datum</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Xjsondb::select('courses') as $course) { ?>
            <?php $Course = new Course($course['id']) ?>
            <tr data-id="<?= $Course->id ?>">
                <td>#<?= $Course->id ?></td>
                <td><?= $Course->inserted ?></td>
                <td><?= $Course->db['name'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
