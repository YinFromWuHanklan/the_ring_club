<?php
$Customer = new Customer(_var('id', $_GET));
$id = $Customer->id;
?>
<h1><?= $Customer->name ?></h1>

<script>var CUSTOMER_ID = <?= $id ?>;</script>
<div class="customer_id"><?= $id ?></div>
<div class="button customer_edit" data-popup="api/adm_customer.php?userid=<?= $id ?>">Bearbeiten</div>

<h2>Person</h2>
<div class="detail_row">
    <div class="detail_row_label">
        Anrede
    </div>
    <div class="detail_row_value">
        <?= $Customer->anrede ?>
    </div>
</div>
<div class="detail_row">
    <div class="detail_row_label">
        Vorname
    </div>
    <div class="detail_row_value">
        <?= $Customer->db['firstname'] ?>
    </div>
</div>
<div class="detail_row">
    <div class="detail_row_label">
        Nachname
    </div>
    <div class="detail_row_value">
        <?= $Customer->db['lastname'] ?>
    </div>
</div>

<h2>Bank</h2>
<div class="detail_row">
    <div class="detail_row_label">
        IBAN
    </div>
    <div class="detail_row_value">
        <?= $Customer->db['bank_iban'] ?>
    </div>
</div>

<h2>Kontakt</h2>
<div class="detail_row">
    <div class="detail_row_label">
        E-Mail
    </div>
    <div class="detail_row_value">
        <?= @$Customer->db['email'] ?>
    </div>
</div>
<div class="detail_row">
    <div class="detail_row_label">
        Telefon
    </div>
    <div class="detail_row_value">
        <?= @$Customer->db['phone'] ?>
    </div>
</div>
