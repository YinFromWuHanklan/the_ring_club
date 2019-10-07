<?php
$website_title = 'Neueröffnung the Ring Boxing Club';
$website_description = 'Neueröffnung the Ring Boxing Club';
include '../components/html_top_no_header.php';
?>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="my-5 col-md-8">
        <img src="assets/images/thering-logo.png" alt="The Ring" width="400" class="img-fluid mx-auto d-block" />
        <h1>The Ring Boxing Club Opening<br /><br />04.11.2019</h1>

        <p id="countdownOpening" class="text-white text-center mt-5 p-3"></p>

        <h2 class="text-center">Preise</h2>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card bg-dark m-3 text-white">
                    <div class="card-header text-center">
                        12 Monate
                    </div>
                    <div class="card-body text-center">
                        <div class="card-title pricing-card-title">
                            €149,-
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
                            €189,-
                            <small class="text-muted">/ mtl.</small>
                        </div>
                    </div>            
                </div>
            </div>
        </div>

        <p>
            zzgl. einmalig 150,- € Aufnahmegebühr
        </p>

        <h2 class="text-center">Anmeldung</h2>
        <form class="mt-5 p-3 rounded" data-ajax-form="api/trial_registration.php"
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
            <div class="form-group">
                <label for="openingKurs" class="text-white">Kurs wählen</label><br />
                <select name="course">
                    <option value="">Kurs auswählen</option>
                    <option value="bomo18">Boxen Montag 18:30-20:00 Uhr</option>
                    <option value="bomo20">Boxen Montag 20:00-21:30 Uhr</option>
                    <option value="bodi18">Boxen Dienstag 18:30-20:00 Uhr</option>
                    <option value="bodi20">Boxen Dienstag 20:00 Uhr Sparring</option>
                    <option value="bomi18">Boxen Mittwoch 18:30-20:00 Uhr</option>
                    <option value="bomi20">Boxen Mittwoch 20:00-21:30 Uhr</option>
                    <option value="bodo18">Boxen Donnerstag 18:30-20:00 Uhr</option>
                    <option value="bodo20">Boxen Donnerstag 20:00-21:30 Uhr</option>
                    <option value="bofr17">Boxen Freitag 17:00-18:30 Uhr</option>
                    <option value="atmo18">Athletic Montag 18:00-19:00 Uhr</option>
                    <option value="atmo19">Athletic Montag 19:15-20:30 Uhr</option>
                    <option value="atdi18">Athletic Dienstag 18:00-19:00 Uhr</option>
                    <option value="atdi19">Athletic Dienstag 19:15-20:30 Uhr</option>
                    <option value="atmi18">Athletic Mittwoch 18:00-19:00 Uhr</option>
                    <option value="atmi19">Athletic Mittwoch 19:15-20:30 Uhr</option>
                    <option value="atdo18">Athletic Donnerstag 18:00-19:00 Uhr</option>
                    <option value="atdo19">Athletic Donnerstag 19:15-20:30 Uhr</option>
                    <option value="atfr17">Athletic Freitag 17:00-18:00 Uhr</option>
                    <option value="atfr18">Athletic Freitag 18:15-19:30 Uhr</option>
                </select>
            </div>
            <div class="xcaptcha mt-4" data-xcaptcha></div>
            <div class="text-center mt-4">
                <button type="submit" class="btn p-3">Probetraining jetzt buchen</button>
            </div>
        </form>
    </div>
    <div class="col-md-2">

    </div>
</div>

<?php include ROOT . "components/html_bottom.php"; ?>
