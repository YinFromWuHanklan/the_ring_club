<!DOCTYPE html>
<html class="<?= Admin::is_logged_in() ? 'logged_in' : 'logged_out' ?>">
    <head>
        <title>Administration</title>
        <meta name="description" content="Administration" />

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link rel="stylesheet" href="assets/css/style_admin<?= IS_LIVE ? '.min' : '' ?>.css" />
    </head>
    <body id="body">
        <div id="page">
            <header>
                <div class="logo">The Ring Club - Administration</div>
                <nav>
                    <ul>
                        <li>
                            <a href="index">Dashboard</a>
                        </li>
                        <li>
                            <a href="trials">Opening-Anmeldungen</a>
                        </li>
                        <li>
                            <a href="customers">Kunden</a>
                        </li>
                        <li>
                            <a href="courses">Kurse</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <main>
                ###CONTENT###
            </main>
        </div>
        <script>
            var BASEURL = "<?= BASEURL ?>";
        </script>
        <script src="assets/js/script_admin<?= IS_LIVE ? '.min' : '' ?>.js" async></script>
    </body>
</html>