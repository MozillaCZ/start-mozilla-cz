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
