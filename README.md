# livewire-memory-game

![PHP](https://img.shields.io/badge/PHP-v8.1+-828cb7.svg?style=flat-square&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-v10.10+-f55247.svg?style=flat-square&logo=laravel)
![Livewire](https://img.shields.io/badge/Livewire-v3.4+-00d88e.svg?style=flat-square&logo=laravel)
![Alpine.js](https://img.shields.io/badge/Alpine.js-v2.8+-8bc0d0.svg?style=flat-square&logo=alpine.js)
![SQLite](https://img.shields.io/badge/SQLite-v3.36+-003b57.svg?style=flat-square&logo=sqlite)
![NPM](https://img.shields.io/badge/NPM-v9.5+-cb3837.svg?style=flat-square&logo=npm)
[![MIT Licensed](https://img.shields.io/github/license/noweh/livewire-memory-game)](licence.md)

Source code for Final Fantasy Memory Quest.

### Game content:
![game.gif](assets%2Fgame.gif)

### Rules

|                          ![success.gif](assets%2Fsuccess.gif)                           |                                              ![error.gif](assets%2Ferror.gif)                                              |
|:---------------------------------------------------------------------------------------:|:--------------------------------------------------------------------------------------------------------------------------:|
| :green_circle:  If the two cards are <span style="color:green">the same</span>, then you win 10 points. | :red_circle: If the two cards are <span style="color:red">different</span>, then you lose 1 point and the number of Attempts increases. |

## Screenshots

### Dashboard
![dashboard.jpg](assets%2Fdashboard.jpg)

### Credits
![credits.jpg](assets%2Fcredits.jpg)

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
