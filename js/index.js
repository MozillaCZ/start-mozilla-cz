window.addEventListener('load', () => document.getElementById('q').focus());
window.addEventListener('load', () => {
    const tips = [
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
    ];
    const tip = document.createElement('p');
    tip.innerHTML = tips[Math.floor(Math.random()*tips.length)];
    document.getElementById('tips').appendChild(tip);

    new DynamicBoxes();
});
