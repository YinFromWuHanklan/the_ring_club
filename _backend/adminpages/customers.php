<?php
$customers = Xjsondb::select('customers');
?>
<h1>Kunden</h1>

<?= File::instance(DIR_BACKEND . 'partials/customers_table.php')->get_content() ?>

<div class="button_create" data-popup="api/adm_customer.php?mode=create">Neuen Kunden erstellen</div>
