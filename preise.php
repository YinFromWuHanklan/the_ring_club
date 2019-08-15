<!DOCTYPE html>
<html>

<head>
    <title>The Ring Club</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:300,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="scripts.js"></script>
</head>

<body>

<?php include("components/navbar.html"); ?>

    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="m-5 col-md-8">

            <?php include("components/header.html"); ?>

            <h1>Preise</h1>
            <table class="table table-bordered table-dark mt-5">
                <tr>
                    <td>12 Monate Laufzeit</td>
                    <td>149,00€ monatl.</td>
                </tr>
                <tr>
                    <td>6 Monate Laufzeit</td>
                    <td>189,00€ monatl.</td>
                </tr>
            </table>
            <p>Aufnahmegebühr 150,00€</p>
            
        </div>
        <div class="col-md-2">
            
        </div>
    </div>




    <?php include("components/footer.html"); ?>

    <?php include("components/bootstrap_scripts.html"); ?>

</body>

</html>