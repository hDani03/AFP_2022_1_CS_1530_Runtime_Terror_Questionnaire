# Funkcionális terv 

## Készítette: 
            - Futó Richárd
           

## 1. Áttekintés

Egy olyan webalkalmazást fejlesztünk megrendelőnk részére, amely segítségével könnyedén feltudja mérni az ügyfelei, célközönsége igényeit. Illetve, nem titkolt célja ezen alkalmazásnak, a papír alapú kérdőívek visszább szorítása, környezeti okokból kifolyólag. Másik pozitívum az alkalmazást illetően hogy többféle eszközön elérhető lesz, révén, az online felületéből adódóan. Ebből kifolyólag törekszünk a reszponvíz tervezésre, hogy minden eszközön megfelelő élményt nyújtson a kitöltők részére. A megrendelő részéről lehetőséget biztosítunk kérdőívek létrehozására, amit elérhet megfelelő autentikációval, valamint a rendszeres felhasználók bejelentkezést követően, vagy a nem rendszeres felhasználók, bejelentkezés nélkül is kitölthetik a kérdőíveket. A weboldal a kitöltött kérdőívek és a regisztrál vagyis a rendszeres felhasználók adatai alapján pedig statisztikát készít. 

## 2. Jelenlegi helyzet

A megrendelő szeretné leváltani a papír alapú kérdőíveit annak környezetkárosító hatásai miatt, illetve ílymódon, nagyobb réteget tud elérni. A web-es felületnek köszönhetően pedig a kérdőívek feldolgozása is jóval leegyszerűsödik, mivel az oldal képes statisztikai kimutatásra, így, egy esetleges kutatási célzattal elindított kérdőív, a megrendelő felőli igényfelmérést is könnyedén lebonyolíthatja, például egy új termék bevezetése előtt. Ebből kifolyólag, hogy a statisztikák minél pontosabb eredményeket hozzanak, elengedhetetlen hogy minél több eszközön elérhető legyen, amit oly módon biztosítunk, hogy egy reszponzív web-es felületet hozunk létre. A megrendelő ezért ragaszkodott hozzá hogy egy PHP alapú framework-öt használjunk, ami egy tovább fejlesztést is leegyszerűsít.

## 3. Követelménylista

| Modul  | Id | Név | Kifejtés |
| ------------- | ------------- | ------------- | -------------|
| Felhasználói rendszer | K1  | Bejelentkező felület | Az oldalra be lehet lépni |
| Felhasználói rendszer | K2  | Admin felület | A megrendelő be tud jelentkezni az oldalra |
| Felhasználói rendszer | K3  | Jelszó módosítás | Regisztrált felhasználók tudják módosítani a jelszavukat |
| Létrehozás | K4  | Kérdőív létrehozása | A felhasználók létre tudnak hozni új kérdőívet |
| Módosítás | K5  | Kérdőív módosítása | A megrendelő az igényeinek megfelelően tudja módosítani a már létrehozott kérdőíveket |
| Törlés | K6  | Kérdőív törlése | A megrendelő törölni tud egy adott kérdőívet |
| Kitöltés | K7  | Kérdőív kitöltése | Az oldal felhasználói az igényelt adataik megadását követően kitölthetik a kérdőíveket |
| Statisztika | K8  | Statisztika generálása | A már kitöltött kérdőívek és a felhasználók adatai alapján az oldal statisztákát készít |

## 4. Jelenlegi üzleti folyamatok modellje

Ügyfelünk jelenleg a kérdőíveit papír alapú formában használja, ami nem kevés nyomtatási költséggel jár, és idővel, ami alatt megszerkesztik azokat, illetve a hatékonyságot illetően, az hogy postai úton célba kell juttatni mindet, nem kevés logisztikát igényel. Ez természetesen az célcsoport szempontjából sem túl eredményes, nem beszélve arról, hogy ílymódon jelentős számú adattól esik el, mivel nem tud egyszerre szélesebb kört megszólítani.


