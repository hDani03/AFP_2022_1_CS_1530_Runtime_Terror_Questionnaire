# Rendszerterv
## 1. A rendszer célja
A rendszer egy online kérdőív kitöltő weboldal, ahol a regisztrált felhasználók létre tudnak hozni saját kérdőíveket, és a sajátjukat törölni is tudják. Egy kérdőív kitöltéséhez nem kötelező regisztrálni, de viszont a létrehozáshoz kötelező. A rendszer készít statisztikát egyes kérdőívekről, hogy adott kérdésekre az emberek hány százaléka mit válaszolt. A projekt kizárólag webes felületen elérhető, így nem célunk, hogy futtatható alkalmazás formájában is elkészítsük.

## 2. Projektterv

### 2.1 Projektszerepkörök, felelőségek:
   * Scrum masters: Sárosi Gábor
   * Product owner: Sárosi Gábor
   * Üzleti szereplő: Futó Richárd, Huszka Dániel, Biesz Dávid
     
### 2.2 Projektmunkások és felelőségek:
   * Frontend: Futó Richárd, Huszka Dániel, Biesz Dávid
   * Backend: Futó Richárd, Huszka Dániel, Biesz Dávid
   * Tesztelés: Futó Richárd, Huszka Dániel, Biesz Dávid
     
### 2.3 Ütemterv:

|Funkció                  | Feladat                                | Prioritás | Becslés (nap) | Aktuális becslés (nap) | Eltelt idő (nap) | Becsült idő (nap) |
|-------------------------|----------------------------------------|-----------|---------------|------------------------|------------------|---------------------|
|Követelmény specifikáció |Megírás                                 |         1 |             1 |                      1 |                1 |                   1 |             
|Funkcionális specifikáció|Megírás                                 |         1 |             1 |                      1 |                1 |                   1 |
|Rendszerterv             |Megírás                                 |         1 |             1 |                      1 |                1 |                   1 |
|Program                  |Képernyőtervek elkészítése              |         2 |             1 |                      1 |                1 |                   1 |
|Program                  |Prototípus elkészítése                  |         3 |             8 |                      8 |                8 |                   8 |
|Program                  |Alapfunkciók elkészítése                |         3 |             8 |                      8 |                8 |                   8 |
|Program                  |Tesztelés                               |         4 |             2 |                      2 |                2 |                   2 |

### 2.4 Mérföldkövek:
   * Prototípus átadása

## 3. Üzleti folyamatok modellje
![https://imgur.com/a/L3jgbGt](https://imgur.com/a/L3jgbGt)

## 4. Követelmények

### Funkcionális követelmények

Lásd: Funckionális követelmények
### Nemfunkcionális követelmények

| ID | Megnevezés | Leírás |
| --- | --- | --- |
| K1 | Adat hozzáférés | Egy felhasználó/vendég nem férhet hozzá más felhasználóknak az adataihoz (a nevén kívül) |
| K2 | Vendég szerepkör | Egy vendég nem hozhat létre kérdőívet |

### Támogatott eszközök
Csak webes felületre készítjük a projektet

## 5. Funkcionális terv

### 5.1 Rendszerszereplők
Vendég: Ki tudja tölteni a kérdőíveket(nincsenek adataik)
Felhasználó: Tud létrehozni kérdőívet, és mindent amit a vendég tud
Admin: Tudja kezelni az adatbázist, a felhasználók adatait, és mindent tud amit a felhasználó és a vendég

### 5.2 Menühierarchiák
- Bejelentkezés
  - Bejelentkezés
  - Regisztráció
- Főmenü
  - Kérdőív létrehozása
  - Kérdőív keresése
  - Lapozórendszer
  - Kijelentkezés

## 6. Fizikai környezet
A projekt kizárólag webes felületre készült, csakis böngészőből lehet megnyitni

### Vásárolt softwarekomponensek és külső rendszerek
Nincsenek megvásárolt softwarekomponenseink és külső rendszereink

### Fejlesztő eszközök
- Notepad++
- Visual Studio Code
- MySql Workbench
- Laravel Framework

## 7. Architekturális terv
### Webszerver
A web alkalmazás Laravel keretrendszer használatával készül el.
### Adatbázis rendszer
Az adatbázis, amit használ a weboldal, MySql segítségével lett létrehozva

## 8. Adatbázis terv
![https://imgur.com/a/059Rls9.png](https://imgur.com/a/059Rls9.png)

## 9. Implementációs terv
Weboldalunk elkészítéséhez a html, css, php-ben készült, projektünk elkésztésének megkönnyítése céljából laravel keretrendszert használtunk, ennek a keretrendszernek köszönhetően a fájloknak, amikbe dolgozunk, rendszerezésén könnyebben megoldottuk
