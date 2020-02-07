<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="navbar-brand" href="index.html">
        <img src="assets/images/thering-logo.png" alt="The Ring" width="90" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
            </li>
            -->
            <li class="nav-item <?= nav_css_class('index.html') ?>">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item <?= nav_css_class('studio.html') ?>">
                <a class="nav-link" href="studio.html">Studio</a>
            </li>
            <?php
            // array(
            //     'text' => 'Kursplan',
            //     'href' => 'kursplan.html',
            //     'items' => array(
            //         'kursplan-boxen.html' => 'Kursplan Boxen',
            //         'kursplan-fitness.html' => 'Kursplan Fitness',
            //     )
            // ),
            ?>
            <li class="nav-item <?= nav_css_class('kursplan.html') ?>">
                <a class="nav-link" href="kursplan.html">Kursplan</a>
            </li>
            <li class="nav-item <?= nav_css_class('preise.html') ?>">
                <a class="nav-link" href="preise.html">Preise</a>
            </li>
            <li class="nav-item <?= nav_css_class('probetraining.html') ?>">
                <a class="nav-link" href="probetraining.html">Probetraining</a>
            </li>
            <li class="nav-item <?= nav_css_class('personaltraining.html') ?>">
                <a class="nav-link" href="personaltraining.html">Personaltraining</a>
            </li>
            <?php
            // 'events.html' => 'Events',
            // 'blog.html' => 'Blog',
            // array(
            //     'text' => 'Submenu',
            //     'href' => 'submenu.html', //optional
            //     'items' => array(
            //         'submenu_1.html' => 'Submenu 1',
            //         'submenu_2.html' => 'Submenu 2',
            //         'submenu_3.html' => 'Submenu 3',
            //     )
            // ),
            ?>
        </ul>
        <?php

        function nav_css_class($href, $other_classes = '') {
            if (strstr($_SERVER['REQUEST_URI'], $href)) {
                $other_classes .= ' active';
            }
            return trim($other_classes);
        }
        ?>
    </div>
</nav>
