<?php
$website_title = 'Neueröffnung the Ring Boxing Club';
$website_description = 'Neueröffnung the Ring Boxing Club';
include '../components/html_top.php';
?>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="m-5 col-md-8">

        <h1>The Ring Boxing Club Opening</h1>

        <p id="countdownOpening" class="text-white text-center mt-5 p-3"></p>

        <h2>Eröffnungspreise</h2>
        <div class="card mb-6 shadow-sm">
            <div class="card-header">
                <p>
                    12 Monate
                </p>
            </div>
            <div class="card-body">
                <div class="card-title pricing-card-title">
                    €119,-
                    <small class="text-muted"></small>/ mtl.
                </div>
            </div>
        </div>
        <div class="card mb-6 shadow-sm">
            <div class="card-header">
                <p>
                    6 Monate
                </p>
            </div>
            <div class="card-body">
                <div class="card-title pricing-card-title">
                    €139,-
                    <small class="text-muted"></small>/ mtl.
                </div>
            </div>            
        </div>

        <table class="table table-bordered table-dark mt-5">
            <tr>
                <td>12 Monate</td>
                <td>119,- € mtl.</td>
            </tr>
            <tr>
                <td>6 Monate Laufzeit</td>
                <td>139,- € mtl.</td>
            </tr>
        </table>
        <p>
            100,- € Aufnahmegebühr
        </p>

        <h2>Anmeldung</h2>
        <form class="mt-5" data-ajax-form="api/trial_registration.php"
              data-ajax-form-success="opening_form_ajax_success" data-ajax-form-error="opening_form_ajax_error">
            <div class="form-group">
                <label for="openingName" class="text-white">Name</label>
                <input type="text" class="form-control" name="opening[name]" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="openingPhone" class="text-white">Telefonnummer</label>
                <input type="text" class="form-control" name="opening[phone]" placeholder="Telefonnummer">     
            </div>
            <div class="form-group">
                <label for="openingEmail" class="text-white">Email</label>
                <input type="text" class="form-control" name="opening[email]" placeholder="Email">
            </div>
            <button type="submit" class="btn btn-outline-info">Probetraining jetzt buchen</button>
        </form>
    </div>
    <div class="col-md-2">

    </div>
</div>

<?php include ROOT . "components/html_bottom.php"; ?>
