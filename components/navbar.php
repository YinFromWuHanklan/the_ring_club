<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="navbar-brand" href="index.html">
        <img src="assets/images/thering-logo-white.png" alt="The Ring" width="90" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <?php
            foreach(array(
                'studio.html' => 'Studio',
                'kursplan.html' => 'Kursplan',
                'preise.html' => 'Preise',
                'probetraining.html' => 'Probetraining',
                'kontakt.html' => 'Kontakt',
            ) as $link_href => $link_text) {
                $is_active = false;
                if(strstr($_SERVER['REQUEST_URI'], $link_href)) {
                    $is_active = true;
                }
                echo '<li class="nav-item ' . ($is_active ? 'active' : '') . '">';
                echo '<a class="nav-link" href="' . $link_href . '">';
                echo $link_text;
                echo '</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</nav>