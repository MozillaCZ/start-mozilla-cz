window.addEventListener('load', () => document.getElementById('q').focus());
window.addEventListener('load', () => {
    const tips = [
        'Důvěrná data můžete ze SeaMonkey snadno a rychle vymazat pomocí funkce <span class="nabidka">Vymazat důvěrná data</span>, kterou naleznete v nabídce <span class="nabidka">Nástroje</span>.',
        'Zajímá vás zabezpečení aktuálně prohlížené webové stránky? Klepněte na ikonku zámku v pravém dolním rohu SeaMonkey a dozvíte se více.',
        'Zavřeli jste si v SeaMonkey omylem panel s webovou stránkou? Klepněte pravým tlačítkem myši nad ouško panelu a v nabídce zvolte <span class="nabidka">Obnovit zavřený panel</span>.',
        'Víte, že si můžete v SeaMonkey nastavit automatický podpis e-mailu? Otevřete nastavení účtu, klepněte na jeho název a do pole <span class="nabidka">Text podpisu</span> zadejte jeho podobu.',
        'Chcete, po spuštění SeaMonkey automaticky otevřít panely z minula? V dialogu <span class="nabidka">Předvolby</span> vyberte v sekci <span class="nabidka">Prohlížeč</span> volbu <span class="nabidka">Obnovit předchozí relaci</span>.',
        'Chcete při odpovídání na e-mail zahrnout do odpovědi pouze část textu zprávy? Jednoduše ji v SeaMonkey označte a klepněte na tlačítko <span class="nabidka">Odpovědět</span>. V okně odpovědi se zobrazí pouze zvolená část.',
        'SeaMonkey je přeloženo do českého jazyka jen díky práci našich dobrovolníků. <a href="https://www.mozilla.cz/zapojte-se/lokalizace/">Připojte se do našeho lokalizačního týmu</a> a pomozte nám udržet SeaMonkey v češtině.',
        'Víte, že vývoj SeaMonkey je financován z dobrovolných příspěvků? Podpořit projekt zasláním finančního daru můžete na <a href="https://www.seamonkey-project.org/donate/">této stránce</a>.'
    ];
    const tip = document.createElement('p');
    tip.innerHTML = tips[Math.floor(Math.random()*tips.length)];
    document.getElementById('tips').appendChild(tip);

    new DynamicBoxes();
});
