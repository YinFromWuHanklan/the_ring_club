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
            <!-- ToDo: Navbar mit Dropdown
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
            </li>
            -->
            <?php
            foreach (array(
        'index.html' => 'Home',
        'studio.html' => 'Studio',
        // array(
        //     'text' => 'Kursplan',
        //     'href' => 'kursplan.html',
        //     'items' => array(
        //         'kursplan-boxen.html' => 'Kursplan Boxen',
        //         'kursplan-fitness.html' => 'Kursplan Fitness',
        //     )
        // ),
        'kursplan.html' => 'Kursplan',
        'preise.html' => 'Preise',
        'probetraining.html' => 'Probetraining',
        'personaltraining.html' => 'Personaltraining',
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
            ) as $link_href => $link_text) {
                if (is_array($link_text) && isset($link_text['text'])) {
                    $is_active = false;
                    if (isset($link_text['href']) && strstr($_SERVER['REQUEST_URI'], $link_text['href'])) {
                        $is_active = true;
                    }
                    echo '<li class="nav-item ' . ($is_active ? 'active' : '') . '">';
                    if (isset($link_text['href'])) {
                        echo '<a class="nav-link" href="' . $link_text['href'] . '">';
                    }
                    echo $link_text['text'];
                    if (isset($link_text['href'])) {
                        echo '</a>';
                    }
                    #
                    if (isset($link_text['items']) && is_array($link_text['items']) && !empty($link_text['items'])) {
                        $submenu_html = '<ul>';
                        foreach ($link_text['items'] as $item_href => $item_text) {
                            $submenu_html .= navi_li($item_href, $item_text, '-sub');
                        }
                        $submenu_html .= '</ul>';
                        echo $submenu_html;
                    }
                    #
                    echo '</li>';
                } else if (is_string($link_text)) {
                    echo navi_li($link_href, $link_text);
                }
            }

            function navi_li($href, $text, $class_affix = '') {
                $html = '';
                $is_active = false;
                if (strstr($_SERVER['REQUEST_URI'], $href)) {
                    $is_active = true;
                }
                $html .= '<li class="nav-item' . $class_affix . ' ' . ($is_active ? 'active' : '') . '">';
                $html .= '<a class="nav-link' . $class_affix . '" href="' . $href . '">';
                $html .= $text;
                $html .= '</a>';
                $html .= '</li>';
                return $html;
            }
            ?>
        </ul>
    </div>
</nav>