<?php include 'library/init.php'; ?><!DOCTYPE html>
<html>

<head>
    <title>Kontakt</title>
    <meta name="description" content="Kontakt">
    <?php fetch_file('head.html') ?>
</head>

<body>

<?php fetch_file("navbar.php"); ?>

<?php include("components/header.html"); ?>

    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="m-5 col-md-8">

            <h1>Kontakt</h1>
            <p>The Ring Club</p>
            <p>
                München-Pasing
            </p>
            <p>
                <!-- Telefon: 089/123456789<br /> -->
                Email: <a href="mailto:info@thering-muc.de">info@thering-muc.de</a>
            </p>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>    




    <?php include("components/footer.html"); ?>

    <?php include("components/bootstrap_scripts.html"); ?>

</body>

</html>