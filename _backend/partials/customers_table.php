<table class="admintable customer_table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Datum</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Xjsondb::select('customers') as $customer) { ?>
            <?php $Customer = new Customer($customer['id']) ?>
            <tr data-id="<?= $Customer->id ?>">
                <td>#<?= $Customer->id ?></td>
                <td><?= $Customer->inserted ?></td>
                <td><?= $Customer->name ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
