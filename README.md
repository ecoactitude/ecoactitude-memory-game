# livewire-memory-game

![PHP](https://img.shields.io/badge/PHP-v8.1+-828cb7.svg?style=flat-square&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-v10.10+-f55247.svg?style=flat-square&logo=laravel)
![Livewire](https://img.shields.io/badge/Livewire-v3.4+-00d88e.svg?style=flat-square&logo=laravel)
![Alpine.js](https://img.shields.io/badge/Alpine.js-v2.8+-8bc0d0.svg?style=flat-square&logo=alpine.js)
![SQLite](https://img.shields.io/badge/SQLite-v3.36+-003b57.svg?style=flat-square&logo=sqlite)
![NPM](https://img.shields.io/badge/NPM-v9.5+-cb3837.svg?style=flat-square&logo=npm)
[![MIT Licensed](https://img.shields.io/github/license/noweh/livewire-memory-game)](licence.md)

Source code for Eco-Actitude Memory Quest.

### Game content:
![game.png](assets%2Fgame.png)

### Rules

|                                   ![success.gif](assets%2Fsuccess.gif)                                    |                                              ![error.gif](assets%2Ferror.gif)                                              |
|:---------------------------------------------------------------------------------------------------------:|:--------------------------------------------------------------------------------------------------------------------------:|
| :green_circle:  If the two cards are <span style="color:green">the same</span>, then you win 10+5 points. | :red_circle: If the two cards are <span style="color:red">different</span>, then you lose 1 point and the number of Attempts increases. |

#### Scoring

- a combo is a pair of cards found in a row
- 10 points for each pair found + 5 points for each combo cumulated
- -1 point for each pair not found if the score is less than 10
- -10% of the score for each pair not found if the score is greater than 10

#### Combos bonus

<table>
  <tr>
    <td>
      <img src="assets/combo1.gif" alt="Combo" width="49.5%"/>
      <img src="assets/combo2.gif" alt="Combo" width="49.5%"/>
    </td>
  </tr>
  <tr>
    <td>
      :green_circle:  If you find a pair of cards in a row, you win 10+5*{combos} points.
    </td>
  </tr>
</table>


violet | rond blanc | carré dans vert |  rond blanc diff | rond blanc diff | carré blanc pot
stylo vert | violet | lessive | rond blanc | carré blanc pot | savon violet
savon violet | jardin suspendu | jardin suspendu | stylo vert | carré vert | lessive
## Screenshots

### Dashboard
![dashboard.jpg](assets%2Fdashboard.png)

## BACK-END INSTALL

### Requirement

You will need to have the following installed:

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)
- [SQLite](https://www.sqlite.org/index.html)

To install the back-end vendors, launch the following command:

```bash
cd project
composer install
```

### .env file

The `.env` file is mandatory to set up the site. The file should be located in the root of the project.
Copy the `.env.example` file and rename it to `.env`.

### Cache

To clear the cache, run the following command:

```bash
sh scripts/refresh_cache.sh
```

### Database

To create the database, run the following command:

```bash
php artisan migrate
```

### Seed

To seed the database, run the following command:

```bash
php artisan db:seed
```

### Livewire

To publish the Livewire assets, run the following command:

```bash
php artisan livewire:publish --assets
```

## FRONT-END INSTALL

### Requirement

You will need to have the following installed:

- [Node.js](https://nodejs.org/en/)
- [NPM](https://www.npmjs.com/)

To compile the front-end assets, launch the following command to install the dependencies:

```bash
npm run development
```
Or, for minified assets:
```bash
npm run production
```

You should now see two new files within your projexts `public` folder:
- .public/css/app.min.css
- .public/js/app.min.js

To watch for changes, run the following command:

```bash
npm run start
```
