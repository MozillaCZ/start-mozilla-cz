<?php
require 'inc/common.php';
updateCookies();
?>
<!DOCTYPE html>
<html xml:lang="cs" lang="cs">
    <head>
        <meta charset="UTF-8">
        <title>Mozilla Start</title>
        <link rel="stylesheet" href="/start.css" type="text/css"/>
        <link rel="shortcut icon" href="/favicon.ico"/>
        <meta name="copyright" content="Copyright (c) 2009-<?php echo date('Y'); ?> Mozilla.cz"/>
    </head>
    
    <body>
        <div id="page">
            <div id="head">
                <h1><span>Mozilla Start</span></h1>
                <ul>
                    <li><a href="https://www.mozilla.cz/">Mozilla.cz</a></li>
                    <li><a href="https://www.mozilla.cz/stahnout/">Stáhnout</a></li>
                    <li><a href="https://www.mozilla.cz/produkty/firefox/">Firefox</a></li>
                    <li><a href="https://www.mozilla.cz/produkty/thunderbird/">Thunderbird</a></li>
                    <li><a href="https://www.mozilla.cz/produkty/seamonkey/">SeaMonkey</a></li>
                </ul>
            </div>
            
            <div id="search" class="box">
                <h2><a href="https://duckduckgo.com/">DuckDuckGo</a></h2>
                <div id="links">
                    <a href="https://duckduckgo.com/settings">Nastavení DuckDuckGo</a>
                </div>
                <form action="https://duckduckgo.com/" method="GET">
                    <fieldset>
                        <img src="/img/ddg_logo.svg" alt="DuckDuckGo logo"/>
                        <input type="hidden" name="kl" value="cz-cs"/>
                        <input type="text" name="q" size="31" id="q"/>
                        <input type="submit" value="Hledat"/>
                    </fieldset>
                </form>
            </div>
            
            <?php if (isBoxVisible('l10n')) : ?>
                <div id="l10n" class="box">
                    <h2>Lokalizace SeaMonkey</h2>
                    <div class="hide">
                        <a href="?hide-box=l10n">Skrýt box</a>
                    </div>
                    <p>Chcete nám pomoci s překladem SeaMonkey? Ozvěte se nám na <span class="nabidka">info@mozilla.cz</span>, kde se dozvíte další informace.</p>
                </div>
            <?php endif; ?>
            
            <div id="news" class="box">
                <h2>Novinky</h2>
                <div id="kratce">
                    <?php echo getRSSHeaders('http://firefox-rss.ceskenoviny.cz/', 6); ?>
                </div>
                <div id="mozilla">
                    <?php echo getRSSHeaders('https://www.mozilla.cz/feed/', 7); ?>
                </div>
                <div class="cb"></div>
            </div>
            
            <div id="tips" class="box">
                <h2>Tip k SeaMonkey</h2>
                <?php
                $tips = array(
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
                    'Víte, že vývoj SeaMonkey je financován z dobrovolných příspěvků? Podpořit projekt zaslání finančního daru můžete na <a href="https://www.seamonkey-project.org/donate/">této stránce</a>.'
                );
                echo '<p>' . $tips[array_rand($tips)] . '</p>';
                ?>
            </div>
        </div>
        
        <div id="foot">
            <p>
                Copyright &copy; 2009&ndash;<?php echo date('Y'); ?> <a href="https://www.mozilla.cz/">Mozilla.cz</a>,
                zpravodajství dodávají <a href="http://www.ceskenoviny.cz/">ČeskéNoviny.cz</a>,
                hostováno <a href="https://www.cesky-hosting.cz/">Český hosting</a>.
                <?php if (!isset($_COOKIE['hide-box']) || $_COOKIE['hide-box'] != "") : ?>
                    <a href="?hide-box=">Obnovit skryté</a>
                <?php endif; ?>
            </p>
        </div>
        <script type="text/javascript" src="/js/sf.js"></script>
        <script type="text/javascript" src="/js/google-analytics.js"></script>
    </body>
</html>
