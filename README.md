# Start.mozilla.cz

[![Build Status](https://api.travis-ci.com/MozillaCZ/start-mozilla-cz.svg?branch=master)](https://travis-ci.com/MozillaCZ/start-mozilla-cz)

Web [Start.mozilla.cz](https://start.mozilla.cz/) je úvodní stránkou v prohlížeči balíku SeaMonkey (dříve Mozilla Suite).

### Náhled
Před prvním zobrazením (nebo po změně souboru `Gemfile`) je potřeba stáhnout potřebné závislosti.
```
$ bundle install --path vendor/bundle
```

Při úpravách vzhledu i obsahu je dobré rovnou se podívat na výsledek. Níže uvedený příkaz sestaví obsah repositáře a zpřístupní ho na lokální adrese http://localhost:4000/.
```
$ bundle exec jekyll serve
```
Příkaz stačí spustit jednou v samostatném terminálu a nechat běžet. Pokud pak ve zdrojových souborech provedete nějakou změnu, Jekyll sestaví stránky znovu. Pro zobrazení efektu změn stačí obnovit načtenou stránku v prohlížeči (*F5*).

## Sestavení statické verze
Pro sestavení webu slouží tento příkaz.
```
$ bundle exec jekyll build
```
Statická verze stránek je vygenerovaná do adresáře `_site`. Pro nasazení stačí jeho obsah nahrát na server třeba přes FTP.
