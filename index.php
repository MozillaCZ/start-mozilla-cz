<?php
require 'inc/lastRSS.php';
require 'inc/common.php';

$rss = new lastRSS;
$rss->cache_dir = './cache';
$rss->cache_time = 1200;
$rss->cp = "";
$rss->default_cp = "UTF-8";

updateCookies();

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
<script type="text/javascript" src="/js/sf.js"></script>
</head>
<body id="start-mozilla-cz">
<div id="page">
	<div id="head">
		<h1><span>Mozilla Start</span></h1>
		<ul>
			<li><a href="https://www.mozilla.cz/">Mozilla.cz</a></li>
			<li><a href="https://www.mozilla.cz/stahnout/">Stáhnout</a></li>
      <li><a href="http://www.seamonkey-project.org/donate/">Přispět</a></li>
			<li><a href="https://www.mozilla.org/cs/firefox/">Firefox</a></li>
			<li><a href="https://www.mozilla.org/cs/thunderbird/">Thunderbird</a></li>
			<li><a href="http://www.seamonkey-project.org/">SeaMonkey</a></li>
		</ul>
	</div>

	<div id="search" class="box">
		<h2><a href="https://duckduckgo.com/">DuckDuckGo</a></h2>
		<form action="https://duckduckgo.com/" method="get">
		    <fieldset>
				<img src="/img/ddg_logo.png" alt="DuckDuckGo logo" />
				<input type="hidden" name="kl" value="cz-cs" />
				<input type="text" name="q" size="31" id="q" />
				<input type="submit" value="Vyhledat" />
			</fieldset>
		</form>
		<div id="links">
			<a href="https://duckduckgo.com/settings">Nastavení DuckDuckGo</a>
		</div>
	</div>
    
        <?php
            if(isBoxVisible('l10n')){
                echo '
                <div id="l10n" class="box">
                    <h2>Lokalizace SeaMonkey</h2>
                    <p>Chcete nám pomoci s překladem SeaMonkey? Ozvěte se nám na <span class="nabidka">info@mozilla.cz</span>, kde se dozvíte další informace.</p>
                    <div class="hide">
                        <a href="?hide-box=l10n">Skrýt box</a>
                    </div>
                </div>
                ';
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
			<h3><a href="https://www.mozilla.cz/">Mozilla.cz</a></h3>
			<?php
			getRSSHeaders('https://www.mozilla.cz/feed/', MOZILLA_ITEMS);
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
                                'SeaMonkey je přeložen do českého jazyka jen díky dobrovolníkům. Chcete se k nim přidat? Napište na <span class="nabidka">info@mozilla.cz</span>, kde vám poskytneme více informací.',
                                'Víte, že vývoj SeaMonkey je financován z dobrovolných příspěvků? Podpořit projekt zaslání finančního daru můžete na <a href="http://www.seamonkey-project.org/donate/">této stránce</a>.'
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
		Copyright &copy; 2009&ndash;<?php echo date('Y'); ?> <a href="https://www.mozilla.cz/">Mozilla.cz</a>,
		&nbsp;zpravodajství dodávají <a href="http://www.ceskenoviny.cz/">ČeskéNoviny.cz</a>,
                hostováno <a href="http://www.cesky-hosting.cz/">Český hosting</a>. 
                <?php if(!isset($_COOKIE['hide-box']) || $_COOKIE['hide-box'] != "") echo'<a href="?hide-box=">Obnovit skryté boxy</a>'; ?>
	</p>
</div>
<script type="text/javascript" src="/js/google-analytics.js"></script>
</body>
</html>
