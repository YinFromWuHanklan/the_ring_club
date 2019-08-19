<?php include 'library/init.php'; ?><!DOCTYPE html>
<html>

<head>
    <title>The Ring Club</title>
    <?php fetch_file('head.html') ?>
</head>

<body>

<?php fetch_file("navbar.php"); ?>

<?php include("components/header.html"); ?>

    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="m-5 col-md-8">

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
        <div class="col-md-2">
            
        </div>
    </div>




    <?php include("components/footer.html"); ?>

    <?php include("components/bootstrap_scripts.html"); ?>

</body>

</html>