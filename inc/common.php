<?php
    /* if the title is longer than $length, trim it and add "…" */
    function trimRSSHeader($header, $length) {
        $header = html_entity_decode ($header);
        if (strlen($header) > $length) {
            return mb_substr($header, 0, $length, 'UTF-8') . '…';
        }
        return $header;
    }

    /* returns headers for the chosen RSS feed */
    function getRSSHeaders($url, $numHeaders) {
        $output = '';
        /* Try to load and parse RSS file */
        $rss = getRSS($url, './cache', 1200);
        if ($rss) {
            /* Show RSS info */
            $output .= "<h3><a href=\"".$rss->channel->link."\">".$rss->channel->title."</a></h3>" . PHP_EOL;
            /* Show last published articles (title, link) */
            $output .= "<ul>" . PHP_EOL;
            $i = 0;
            foreach($rss->channel->item as $item) {
                /* increase internal counter of items */
                $i++;

                $title = trimRSSHeader($item->title, 80);
                $output .= "<li><a href=\"$item->link\">" . htmlspecialchars($title) . "</a></li>" . PHP_EOL;

                /* stop the loop if maximum allowed number of items is reached */
                if($i >= $numHeaders)
                    break;
            };
            $output .= "</ul>" . PHP_EOL;
        } else {
            $output .= "<p>Nepodařilo se načíst RSS kanál.</p>";
        }
        return $output;
    }

    function getRSS($url, $cacheDir, $cacheTTL) {
        $cachedFile = $cacheDir . '/' . sha1($url) . '.cache';
        $cached = is_file($cachedFile) && ( time()-filemtime($cachedFile) > $cacheTTL );
        $fileToLoad = $cached ? $cachedFile : $url;
        $rss = simplexml_load_file($fileToLoad);
        if (!$cached && $rss) {
            $rss->asXML($cachedFile);
            clearstatcache($cachedFile);
        }
        return $rss;
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
