<?php
    /* if the title is longer than $length, trim it and add "…" */
    function trimRSSHeader($header, $length) {
        $header = html_entity_decode ($header);
        if (strlen($header) > $length) {
            return mb_substr($header, 0, $length, 'UTF-8') . '…';
        }
        return $header;
    }

    /* echoes headers for the chosen RSS feed */
    function getRSSHeaders($url, $numHeaders) {

        global $rss;

        /* Try to load and parse RSS file */
        if ($rs = $rss->get($url)) {
            /* Show last published articles (title, link) */
            echo "<ul class=\"lnks\">\n";
            $i = 0;
            foreach($rs['items'] as $item) {
                /* increase internal counter of items */
                $i++;

                $title = trimRSSHeader($item['title'], RSS_HEADER_LENGTH);
                echo "\t<li><a href=\"$item[link]\">" . htmlspecialchars($title) . "</a></li>\n";

                /* stop the loop if maximum allowed number of items is reached */
                if($i >= $numHeaders)
                    break;
            };
            echo "</ul>\n";
        } else {
            echo "<p>Nepodařilo se načíst RSS kanál.</p>";
        }
    }

    function isBoxVisible($name){
        foreach (explode(";", $_COOKIE["hide-box"]) as $item) {
            if($item === $name){
                return false;
            }
        }
        return true;
    }

    function updateCookies(){
        if(isset($_GET['hide-box'])){
            $toHide = $_GET['hide-box'];
            $cookie = $_COOKIE['hide-box'];
            if($toHide === ""){
                $cookie = "";
            }elseif(isBoxVisible($toHide)) {
                $cookie = $cookie.";".$toHide;
            }
            setcookie('hide-box', $cookie, time() + (5 * 365 * 24 * 60 * 60), '/', 'start.mozilla.cz', true, true);
            $_COOKIE['hide-box'] = $cookie;
        }
    }
