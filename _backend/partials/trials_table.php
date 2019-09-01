<table class="admintable">
    <thead>
        <tr>
            <td>ID</td>
            <td>Datum</td>
            <td>Name</td>
            <td>E-Mail</td>
            <td>Tel.</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Xjsondb::select('trials') as $trial) { ?>
            <tr>
                <td>#<?= $trial['id'] ?></td>
                <td><?= date('H:i d.m.Y', $trial['insert_date']) ?></td>
                <td><?= $trial['name'] ?></td>
                <td><?= $trial['email'] ?></td>
                <td><?= $trial['phone'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
