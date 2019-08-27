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
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card bg-dark m-3 text-white">
                    <div class="card-header text-center">
                        12 Monate
                    </div>
                    <div class="card-body text-center">
                        <div class="card-title pricing-card-title">
                            €119,-
                            <small class="text-muted">/ mtl.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark m-3 text-white">
                    <div class="card-header text-center">
                        6 Monate
                    </div>
                    <div class="card-body text-center">
                        <div class="card-title pricing-card-title">
                            €139,-
                            <small class="text-muted">/ mtl.</small>
                        </div>
                    </div>            
                </div>
            </div>
        </div>

        <p>
            zzgl. einmalig 100,- € Aufnahmegebühr
        </p>

        <h2>Anmeldung</h2>
        <form class="mt-5" data-ajax-form="api/trial_registration.php"
              data-ajax-form-success="opening_form_ajax_success" data-ajax-form-error="opening_form_ajax_error">
            <div class="form-group">
                <label for="openingName" class="text-white">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="openingPhone" class="text-white">Telefonnummer</label>
                <input type="text" class="form-control" name="phone" placeholder="Telefonnummer">     
            </div>
            <div class="form-group">
                <label for="openingEmail" class="text-white">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <button type="submit" class="btn btn-outline-info">Probetraining jetzt buchen</button>
        </form>
    </div>
    <div class="col-md-2">

    </div>
</div>

<?php include ROOT . "components/html_bottom.php"; ?>
