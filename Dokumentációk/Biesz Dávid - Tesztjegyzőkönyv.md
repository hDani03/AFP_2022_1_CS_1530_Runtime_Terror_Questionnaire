# Tesztjegyzőkönyv

Teszteléseket végezte: Biesz Dávid

Operációs rendszer: Windows 10

Ebben a dokumentumban lesz felsorolva az elvégzett tesztek elvárásai és eredményei, illetve időpontjai (Alfa, Béta és Végleges verzió).

## Alfa teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| A1 | 2022.12.07. | Ne engedje a felhasználót regisztrálni, ha az email mezőbe nem email formátumú szöveg kerül | A funkció az elvárásoknak megfelelt | Nincsenek |
| A2 | 2022.12.07. | Ne engedje a felhasználót regisztrálni, ha a jelszó és a jelszó megerőítés mező nem egyezik | A funkció az elvárásoknak megfelelt | Nincsenek |
| A3 | 2022.12.07. | Az admin egy olyan kérdőívre kattint (statisztika) ami még nem lett kitöltve | A funkció hibára fut | Egy tömb nem létező elemével akar számolni |
| A4 | 2022.12.07. | Kérdőív törlésénél az adatbázisból valóban kitörli a kérdőívet | A funkció az elvárásoknak megfelelt | Nincsenek |
| A5 | 2022.12.07. | Kérdőív módosításánál kizárólag a kérdőívhez tartozó adatok jelennek meg | A funkció az elvárásoknak megfelelt, adatbázisból ellenőrizve | Nincsenek |
| A6 | 2022.12.07. | Új felhasználónak regisztrálásnál legalább 3 karaktert kell megadni a név mezőbe| A funkció az elvárásoknak megfelelt | Nincsenek |


Az Alfa tesztelés során a vizsgált elemek között volt ami nem megfelelően működött, ez a későbbiek során javításra szorul.

Következő tesztelésnél a többi funkció kerül vizsgálatra illetve elemzésre.
## Béta teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| B1 | 2022.12.07. | Az admin egy olyan kérdőívre kattint (statisztika) ami még nem lett kitöltve | A fucnkció kezeli a hibát | Nincsenek |
| B2 | 2022.12.07. | A felhasználó a keresés mezőbe olyan kulcsszót ír be, ami csak a leírásba található, megjeleníti az adott kérdőívet | Megjeleníti az összes olyan kérdőívet, aminek a címébe vagy a leírásába megtalálható az adott kulcsszó | Nincsenek |
| B3 | 2022.12.07. | Ha a felhasználó nincs bejelentkezve, akkor csak a legutóbb hozzáadott kérdőívet listázza ki az oldal | A funkció az elvárásoknak megfelelt | Nincsenek |
| B4 | 2022.12.07. | Ha a felhasználó be van jelentkezve, akkor kérdőívet kérdőívet listázza ki az oldal | A funkció az elvárásoknak megfelelt | Nincsenek |
| B5 | 2022.12.07. | Ha a felhasználó be van jelentkezve, akkor kérdőív módosítása menüpont alatt csakis a felhasználóhoz tartozó kérdőíveket listázza ki az oldal | A funkció az elvárásoknak megfelelt | Nincsenek |
| B6 | 2022.12.07. | Egy vendég csak úgy tud regisztrálni, hogy egyedi email ímet ad meg, azaz ha olyan email címmel próbál regisztrálni ami már benne van az adatbázisban, akkor ezt közli a felhasználóval | A funkció az elvárásoknak megfelelt | Nincsenek |




A Béta teszt sikeresen zajlott.

A végleges tesztelés során az összes fent felsorolt vizsgálati elem újra ellenőrzésre kerül. Ezzel együtt az új funkciók is tesztelésre kerültek.

## Végleges teszt
| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| A1 | 2022.12.07. | Ne engedje a felhasználót regisztrálni, ha az email mezőbe nem email formátumú szöveg kerül | A funkció az elvárásoknak megfelelt | Nincsenek |
| A2 | 2022.12.07. | Ne engedje a felhasználót regisztrálni, ha a jelszó és a jelszó megerőítés mező nem egyezik | A funkció az elvárásoknak megfelelt | Nincsenek |
| A4 | 2022.12.07. | Kérdőív törlésénél az adatbázisból valóban kitörli a kérdőívet | A funkció az elvárásoknak megfelelt | Nincsenek |
| A5 | 2022.12.07. | Kérdőív módosításánál kizárólag a kérdőívhez tartozó adatok jelennek meg | A funkció az elvárásoknak megfelelt, adatbázisból ellenőrizve | Nincsenek |
| A6 | 2022.12.07. | Új felhasználónak regisztrálásnál legalább 3 karaktert kell megadni a név mezőbe| A funkció az elvárásoknak megfelelt | Nincsenek |
| B1 | 2022.12.07. | Az admin egy olyan kérdőívre kattint (statisztika) ami még nem lett kitöltve | A fucnkció kezeli a hibát | Nincsenek |
| B2 | 2022.12.07. | A felhasználó a keresés mezőbe olyan kulcsszót ír be, ami csak a leírásba található, megjeleníti az adott kérdőívet | Megjeleníti az összes olyan kérdőívet, aminek a címébe vagy a leírásába megtalálható az adott kulcsszó | Nincsenek |
| B3 | 2022.12.07. | Ha a felhasználó nincs bejelentkezve, akkor csak a legutóbb hozzáadott kérdőívet listázza ki az oldal | A funkció az elvárásoknak megfelelt | Nincsenek |
| B4 | 2022.12.07. | Ha a felhasználó be van jelentkezve, akkor kérdőívet kérdőívet listázza ki az oldal | A funkció az elvárásoknak megfelelt | Nincsenek |
| B5 | 2022.12.07. | Ha a felhasználó be van jelentkezve, akkor kérdőív módosítása menüpont alatt csakis a felhasználóhoz tartozó kérdőíveket listázza ki az oldal | A funkció az elvárásoknak megfelelt | Nincsenek |
| B6 | 2022.12.07. | Egy vendég csak úgy tud regisztrálni, hogy egyedi email ímet ad meg, azaz ha olyan email címmel próbál regisztrálni ami már benne van az adatbázisban, akkor ezt közli a felhasználóval | A funkció az elvárásoknak megfelelt | Nincsenek |
| V1 | 2022.12.07. | A statisztika az adatbázisban lévő értékekkel dolgozik, és a megfelelő eredményeket kapjuk  | A funkció az elvárásoknak megfelelt, a százalékok összeadása esetén minden alkalommal 100 jön ki | Nincsenek |
| V2 | 2022.12.07. | Ha a felhasználó nincs bejelentkezve, akkor a kérdőív létrehozása gombra kattintva átirányítja a bejelentkezés menüpontra | A funkció az elvárásoknak megfelelt | Nincsenek |
| V3 | 2022.12.07. | A statisztika gomb csak az admin jogosultsággal rendelkező felhasználónak jelenik meg, sima felhasználóknak nem | A funkció az elvárásoknak megfelelt | Nincsenek |
| V4 | 2022.12.07. | Új felhasználónak regisztrálásnál legalább 3 karaktert kell megadni a név mezőbe| A funkció az elvárásoknak megfelelt | Nincsenek |


A Végleges teszt lezajlott és minden funkció rendesen működik, esztétikailag is megfelelő a program.

Átadásra készen áll a megrendelőnek.

Tesztelést végezte és írta: Biesz Dávid

Befejezve: 2022.12.08.
