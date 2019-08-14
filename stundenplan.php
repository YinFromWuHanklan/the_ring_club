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
</head>

<body>

<?php include("components/navbar.html"); ?>


    <!-- Header -->
    <img src="images/header.jpg" alt="The Ring" width="1200" class="img-fluid" />


    <div class="m-5">
        <h1>Stundenplan</h1>
        <table class="table table-bordered table-dark table-responsive mt-5">
            <thead>
                <tr>
                    <td>Montag</td>
                    <td>Dienstag</td>
                    <td>Mittwoch</td>
                    <td>Donnerstag</td>
                    <td>Freitag</td>
                    <td>Samstag</td>
                    <td>
                        Sonntag
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kurs 1</td>
                    <td>Kurs 1</td>
                    <td>Kurs 1</td>
                    <td>Kurs 1</td>
                    <td>Kurs 1</td>
                    <td>Kurs 1</td>
                    <td>Kurs 1</td>
                </tr>
                <tr>
                    <td>Kurs 2</td>
                    <td>Kurs 2</td>
                    <td>Kurs 2</td>
                    <td>Kurs 2</td>
                    <td>Kurs 2</td>
                    <td>Kurs 2</td>
                    <td>Kurs 2</td>
                </tr>
                <tr>
                    <td>Kurs 3</td>
                    <td>Kurs 3</td>
                    <td>Kurs 3</td>
                    <td>Kurs 3</td>
                    <td>Kurs 3</td>
                    <td>Kurs 3</td>
                    <td>Kurs 3</td>
                </tr>
                <tr>
                    <td>Kurs 4</td>
                    <td>Kurs 4</td>
                    <td>Kurs 4</td>
                    <td>Kurs 4</td>
                    <td>Kurs 4</td>
                    <td>Kurs 4</td>
                    <td>Kurs 4</td>
                </tr>
            </tbody>
        </table>
    </div>




    <?php include("components/footer.html"); ?>

    <?php include("components/bootstrap_scripts.html"); ?>

</body>

</html>