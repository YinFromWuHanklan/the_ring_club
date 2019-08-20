<?php
$website_title = 'Neueröffnung the Ring Boxing Club';
$website_description = 'Neueröffnung the Ring Boxing Club';
include 'components/html_top.php';
?>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="m-5 col-md-8">

        <h1>The Ring Boxing Club Opening</h1>
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
        <form class="mt-5">
            <div class="form-group">
                <label for="openingName" class="text-white">Name</label>
                <input type="text" class="form-control" id="openingName" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="openingPhone" class="text-white">Telefonnummer</label>
                <input type="text" class="form-control" id="openingPhone" name="phone" placeholder="Telefonnummer">     
            </div>
            <div class="form-group">
                <label for="openingEmail" class="text-white">Email</label>
                <input type="text" class="form-control" id="openingEmail" name="email" placeholder="Email">
            </div>
            <button type="submit" class="btn btn-outline-info">Probetraining jetzt buchen</button>
        </form>
    </div>
    <div class="col-md-2">

    </div>
</div>    

<?php include("components/html_bottom.php"); ?>
