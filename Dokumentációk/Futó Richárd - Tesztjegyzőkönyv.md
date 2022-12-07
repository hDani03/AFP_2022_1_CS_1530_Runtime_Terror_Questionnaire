# Tesztjegyzőkönyv

Teszteléseket végezte: Futó Richárd

Operációs rendszer: Windows 10

Ebben a dokumentumban lesz felsorolva az elvégzett tesztek elvárásai és eredményei, illetve időpontjai (Alfa, Béta és Végleges verzió).

## Alfa teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Felhasználó regisztráció mezők ellenőrzése | 2022.11.29. | Kötelező minden mezőt kitölteni a megfelelő formátumban, ellenkező esetben nem lehet regisztrálni | Kitöltetlen mező(k) esetében a regisztráció sikertelen | - |
| Bejelentkezés | 2022.11.29. | Bejelentkezés csak regisztrációt követően lehetséges a megfelelő e-mail/jelszó páros megadásával | Hibás vagy hiányzó adatok esetén a hibaüzenet nem jelent meg | Hibaüzenet megjelenítése |
| Vendég felhasználók számára csak egy, a legfrissebb kérdőív megjelenítése | 2022.11.29. | A főoldalon csak a legfrissebb kérdőív jelenik meg | Regisztrálatlan felhasználók számára csak a legfrissebb, aktuális kérdőív jelenik meg | - |
| Legfrissebb kérdőív kitöltése a vendég felhasználók részéről | 2022.11.29. | A kérdőívet sikeresen ki lehet tölteni a vendégeknek | A vendég felhasználók sikeresen le tudják adni a kitöltött kérdőívet | - |
| Vendég felhasználóknak nem engedélyezett a kérdőív létrehozás | 2022.11.29. | Ha a vendég rákattint a kérdőív létrehozás gombra akkor a rendszer irányítsa vissza a bejelentkezés oldalra | Vendégként rákattint a kérdőív létrehozásra és a rendszer vissza irányítsa a bejelentkezés felületre ahol elérhető a regisztráció | - |

Az Alfa teszt során akadtan hibák, mely(ek) javításra szorulnak.

Következő tesztelésnél a többi funkció kerül vizsgálatra illetve elemzésre.
## Béta teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Bejelentkezés | 2022.12.01. | Bejelentkezés csak regisztrációt követően lehetséges a megfelelő e-mail/jelszó páros megadásával | Hibás vagy hiányzó adatok esetén a hibaüzenet már megjelenik | - |
| Kérdőív létrehozása | 2022.12.01. | Mezők kitöltése esetén a kérdőív tárolásra kerül az adatbázisban | Kérdőív sikeresen létrehozható | - |
| Kérdőív létrehozásakor új kérdés felvitele | 2022.12.01. | Új kérdés hozzáadásakor a kérdéshez tartozó mező illetve a kérdéshez tartozó válaszok mezői legenerálásra kerülnek | A mezők megfelelően megjelennek, és a kitöltésüket követően sikeresen létrejön a kérdőív | - |
| Kérdőív létrehozásakor kérdés törlése | 2022.12.02. | Új kérdés felvitelét követően a kérdést lehet törölni amennyiben a felhasználó meggondolná magát | Kérdés törlése gombra kattintva a kérdés és a hozzá tartozó mezők nem tűnnek el | Kérdés törlése gomb nem működik megfelelően |
| Kérdőív létrehozása form vissza gomb | 2022.12.02. | Kérdőív létrehozásának megszakítása, vissza irányítás a főoldalra | Kattintást követően a létrehozás megszakad és a felhasználó átirányításra kerül a főoldalra | - |
| Kérdőívek közti szűrés (keresés) | 2022.12.02. | Keresés mezőbe beírt kulcsszó alapján kilistázza a rendszer a találatnak megfelelő kérdőíveket (keresés címben/rövid leírásban) | "értékelése", "minőségének" kulcsszavakra csak azok a kérdőívek jelennek meg melyek címében/leírásában megtalálható a keresett szó | - |
| Kérdőívek közti szűrés (keresés) ha nincs találat | 2022.12.02. | Ha nincs a keresésnek megfelelő kérdőív a rendszerben akkor a "Nem található kérdőív" üzenet jelenik meg | Az üzenet megjelenik amennyiben nincs a kifejezésnek megfelelő találat | - |


A Béta teszt során akadtan hibák, mely(ek) javításra szorulnak.

A végleges tesztelés során az összes fent felsorolt vizsgálati elem újra ellenőrzésre kerül. Ezzel együtt az új funkciók is tesztelésre kerültek.

## Végleges teszt
| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Kérdőív létrehozásakor kérdés törlése | 2022.12.03. | Új kérdés felvitelét követően a kérdést lehet törölni amennyiben a felhasználó meggondolná magát | Kérdés törlése gombra kattintva a kérdés és a hozzá tartozó mezők már törlésre kerülnek | - |
| Felhasználóhoz tartozó kérdőív módosítása | 2022.12.03. | A felhasználó a saját kérdőívei teljes tartalmát módosíthatja | A módosításra kerülő mezők tartalma frissítésre kerül | - |
| Felhasználóhoz tartozó kérdőív törlése | 2022.12.03. | A felhasználó a saját kérdőíveit törölheti | A felhasználó az általa létrehozott kérdőíveket sikeresen törli | - |
| Bejelentkezett felhasználó nevének megjelenítése az oldal tetején | 2022.12.03. | Bejelentkezést követően a regisztrációnál megadott felhasználónév megjelenik | A bejelentkezett felhasználó neve megjelenik | - |
| Kijelentkezés | 2022.12.03. | Kijelentkezést követően csak a legfrissebb kérdőív érhető el | A kijelentkezett felhasználó vendég állapotba kerül, így csak az aktuális kérdőívhez fér hozzá | - |

A Végleges teszt lezajlott és minden funkció rendesen működik, esztétikailag is megfelelő a program.

Átadásra készen áll a megrendelőnek.

Tesztelést végezte és írta: Futó Richárd

Befejezve: 2022.12.03.
