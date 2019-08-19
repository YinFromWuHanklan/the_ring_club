<?php include 'library/init.php'; ?><!DOCTYPE html>
<html>

<head>
    <title>Probetraining</title>
    <meta name="description" content="Probetraining">
    <?php fetch_file('head.html') ?>
</head>

<body>

<?php fetch_file("navbar.php"); ?>

<?php include("components/header.html"); ?>

    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="m-5 col-md-8">

            <h1>Probetraining</h1>
            <p>
                Da Qualität seine Daseinsberechtigung hat und wir den Probetrainingstourismus nicht fördern haben wir uns
                dazu
                entschlossen für das Probetraining 25.- Euro zu verlangen.
            </p>
            <p>
                Selbstverständlich wird dieser Betrag bei Abschluss einer Mitgliedschaft verrechnet!
            </p>
            <a href="opening.php" role="button" class="btn btn-outline-info">Probetraining buchen</a>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>




    <?php include("components/footer.html"); ?>

    <?php include("components/bootstrap_scripts.html"); ?>

</body>

</html>