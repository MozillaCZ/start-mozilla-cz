<?php
error_reporting(0);
ini_set('display_errors', 0);

require 'inc/lastRSS.php';
require 'inc/common.php';

$rss = new lastRSS;
$rss->cache_dir = './cache';
$rss->cache_time = 1200;
$rss->cp = "";
$rss->default_cp = "UTF-8";

define('RSS_HEADER_LENGTH', 80);
define('NEWS_ITEMS', 6);
define('MOZILLA_ITEMS', 7);
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-language" content="cs" />
<title>Mozilla Start</title>
<link rel="stylesheet" href="/start.css" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" />
<meta name="copyright" content="Copyright (c) 2009 Mozilla.cz" />
<meta name="author" content="HTML code: Adam Hauner; e-mail: aha@pinknet.cz" />
<meta name="robots" content="index,follow" />
<script type="text/javascript">
<!--
function sf(){document.google.q.focus();}
function setCookie(name, value, days){
	var expiration=new Date();
	expiration.setTime(expiration.getTime()+(days*24*3600*1000));
	document.cookie=name+"="+escape(value)+"; expires="+expiration.toGMTString();
}
-->
</script>
</head>
<body id="start-mozilla-cz" onload="sf();">
<div id="page">
	<div id="head">
		<h1><span>Mozilla Start</span></h1>
		<ul>
			<li><a href="http://www.mozilla.cz/">Mozilla.cz</a></li>
			<li><a href="http://www.mozilla.cz/stahnout/">Stáhnout</a></li>
			<li><a href="http://forum.mozilla.cz/">Fórum</a></li>
			<li><a href="https://www.mozilla.org/cs/firefox/">Firefox</a></li>
			<li><a href="https://www.mozilla.org/cs/thunderbird/">Thunderbird</a></li>
			<li><a href="http://www.seamonkey-project.org/">SeaMonkey</a></li>
		</ul>
	</div>

	<div id="search" class="box">
		<h2><a href="http://www.google.com/webhp?hl=cs&amp;tab=iw&amp;client=firefox-a&amp;rls=org.mozilla:cs-CZ:official_s">Google</a></h2>
		<?php

		require "inc/google-adsense-search.php";

		?>
		<div id="links">
			<a href="http://www.google.com/imghp?hl=cs&amp;tab=wi&amp;client=firefox-a&amp;rls=org.mozilla:cs-CZ:official_s">Obrázky</a>&nbsp;
		</div>
	</div>
<?php
	if (isMozillaSuite() && !ignoreMozillaSuiteUpdate()) {
?>
		<div id="sm-update" class="box">
			<h2><a href="http://www.mozilla.cz/stahnout/#seamonkey">Aktualizujte na SeaMonkey</a></h2>
			<p>
				Vývoj aplikace Mozilla Suite byl ukončen. Doporučujeme vám aplikaci
				<a href="http://www.seamonkey-project.org/">SeaMonkey</a>,
				která nabízí stejný rozsah funkcí, totožné uživatelské rozhraní,
				větší rychlost a&nbsp;navíc řadu zajímavých novinek</a>.
			</p>
			<div>
				<a href="http://www.mozilla.cz/stahnout/#seamonkey">stáhnout SeaMonkey</a> &middot;
				<span onclick="setCookie('ignoreMS17Update',1,300);document.getElementById('sm-update').style.display='none'">již neupozorňovat</span>
			</div>
		</div>
<?php
	}
	if (isOldFirefox() && !ignoreFirefoxUpdate()) {
?>
		<div id="sm-update" class="box">
			<h2><a href="http://www.mozilla.cz/stahnout/#firefox">Aktualizujte na nový Firefox</a></h2>
			<p>
				Používáte starou verzi prohlížeče <a href="https://www.mozilla.org/cs/firefox/">Mozilla Firefox</a>.
				Nová verze aplikace Mozilla Firefox opravuje některé bezpečnostní chyby
				a&nbsp;nabízí nové uživatelské funkce.
			</p>
			<div>
				<a href="http://www.mozilla.cz/stahnout/#firefox">stáhnout Firefox</a> &middot;
				<span onclick="setCookie('ignoreFFUpdate',1,300);document.getElementById('sm-update').style.display='none'">již neupozorňovat</span>
			</div>
		</div>
<?php
	}
?>
	<div id="news" class="box">
		<h2>Novinky</h2>
		<div id="kratce">
			<h3><a href="http://www.ceskenoviny.cz/">České noviny</a></h3>
			<?php
			getRSSHeaders('http://firefox-rss.ceskenoviny.cz/', NEWS_ITEMS);
			?>
		</div>
		<div id="mozilla">
			<h3><a href="http://www.mozilla.cz/">Mozilla.cz</a></h3>
			<?php
			getRSSHeaders('http://www.mozilla.cz/feed/', MOZILLA_ITEMS);
			?>
		</div>
		<div class="cb"><!-- --></div>
	</div>

		<?php
			$tips = array (
				'Víte, že můžete v SeaMonkey snadno přepínat lokalizace? Nainstalujte si lokalizace, přejděte do dialogu <span class="nabidka">Předvolby</span> a v sekci <span class="nabidka">Jazyk uživatelského rozhraní</span> zvolte jazyk, který aktuálně chcete.',
				'SeaMonkey od verze 2.0 obsahuje <span class="nabidka">Správce doplňků</span>. Naleznete jej v nabídce <span class="nabidka">Nástroje</span> a můžete pomocí něj snadno vyhledávat nové doplňky.',
				'Důvěrná data můžete v SeaMonkey snadno a rychle smazat pomocí funkce <span class="nabidka">Vymazat důvěrná data</span>, kterou naleznete v nabídce <span class="nabidka">Nástroje</span>.',
				'SeaMonkey umožňuje zobrazit zapomenutá hesla. Přejděte do dialogu <span class="nabidka">Správce hesel</span> a klepněte na tlačítko <span class="nabidka">Zobrazit hesla</span>.',
				'Zajímá vás zabezpečení aktuálně prohlížené webové stránky v SeaMonkey? Klepněte na ikonku zámku v pravém dolním rohu prohlížeče a dozvíte se více.',
				'Zavřeli jste si v SeaMonkey omylem panel prohlížeče? Klepněte nad ouškem panelu pravým tlačítkem myši a v místní nabídce zvolte <span class="nabidka">Zpět zavření panelu</span>.',
				'Víte, že si můžete v nastavení účtu v poštovním klientu SeaMonkey nastavit automatický podpis e-mailu? Otevřete si nastavení účtu, klepněte na jeho název a do pole <span class="nabidka">Text podpisu</span> zadejte jeho podobu.',
				'Chcete, aby balík SeaMonkey po svém spuštění automaticky otevíral panely z minula? Klepněte v dialogu <span class="nabidka">Předvolby</span> na sekci <span class="nabidka">Prohlížeč</span> a zde vyberte volbu <span class="nabidka">Obnovit předchozí relaci</span>.',
				'Chcete při odpovídání na e-mail v SeaMonkey zahrnout do odpovědi pouze část textu zprávy? Jednoduše ji označte a klepněte na tlačítko <span class="nabidka">Odpovědět</span>. V okně odpovědi se zobrazí pouze zvolená část.',
			);
			echo '<div id="tips" class="box">';
			echo '<h2>Tip k SeaMonkey</h2>';
			echo '<p>'.$tips[array_rand($tips)].'</p>';
			echo '</div>';
		?>


</div>

<div id="foot">
	<hr />
	<p>
		Copyright &copy; 2009&ndash;<?php echo date('Y'); ?> <a href="http://www.mozilla.cz/">Mozilla.cz</a>,
		&nbsp;zpravodajství dodávají <a href="http://www.ceskenoviny.cz/">ČeskéNoviny.cz</a>,
		hostováno <a href="http://www.cesky-hosting.cz/?d=15101">Český hosting</a>.
	</p>
</div>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-10350415-6', 'auto');
	ga('send', 'pageview');
</script>
</body>
</html>
