## A Competition Manager applikációról

A CpManager applikáció versenyek kezelésére szolgál. Az admin versenyeket tud létrehozni, azokhoz fordulókat hozzáadni, valamint mind a versenyeket, mind a fordulókat módosítani és törölni tudja. Az admin a felhasználókat hozzá tudja rendelni azokhoz a versenyfordulókhoz, melyeknek határideje még aktuális. A felhasználók meg tudják nézni a versenyeket és hogy azok közül melyekre vannak feljelentkeztetve, ezenkívül pedig rendelkeznek egy profil ablakkal, melyen tudják cserélni jelszavukat.
- Az applikáció egy feladatleírás alapján készült, mely [ezen a linken](https://drive.google.com/file/d/1hiSCO_FXJ5DNbFAdEV6eJ4P5NoGH0c40/view?usp=sharing) keresztül érhető el.

## Futtatási útmutató
- XAMPP [letöltése](https://www.apachefriends.org/download.html) és installálása
- Program elhelyezése ide: `C:\xampp\htdocs\competition_manager`
- XAMPP megnyitása, Apache és MySQL elindítása (Start)
- Böngészőn keresztül megnyitni: `localhost/competition_manager/public`
- Terminálba bevinni: `go ide C:\xampp\htdocs\competition_manager`, aztán:
  - `php artisan migrate`
  - `php artisan migrate:fresh --seed`

## Rövid demonstráció
- Megtalálható ezen a [felvételen.](https://drive.google.com/file/d/1--J6-FZ7IVKajinD8Rj_EQBHZYAXIvQn/view?usp=sharing)
