<table class="admintable">
    <thead>
        <tr>
            <td>ID</td>
            <td>Datum</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Xjsondb::select('customers') as $customer) { ?>
            <tr>
                <td>#<?= $customer['id'] ?></td>
                <td><?= date('H:i d.m.Y', $customer['insert_date']) ?></td>
                <td><?= $customer['name'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
