# User 0
## comandi terminale
- laravel new the_post
- cd the_post
## modifica file .env
- APP_NAME=The_Post
- DB_CONNECTION=mysql
- DB_DATABASE=the_post
## crea database su tableplus
- name the_post
- encoding (l'ultima)
## di nuovo da terminale
- composer i
- php artisan migrate
- npm i
- npm i bootstrap
# User 1
- php artisan migrate
- php artisan storage:link
# User 3
- php artisan migrate
- aggiungere mailtrap https://mailtrap.io/home-> email testing-> my inbox-> smtp settings->integrations-> php-> laravel 9+-> copy-> incolli nell'env al posto dei ripettivi campi: MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxxxxxxxxxxxxx
MAIL_PASSWORD=xxxxxxxxxxxxxx

# User 4
- aggiungi SCOUT_DRIVER=tntsearch al file .env
## da terminale
### per importare gli articoli nella ricerca:
- php artisan scout:import "App\Models\Article"
### per resettare:
- php artisan scout:flush "App\Models\Article"
### e poi:
- php artisan scout:import "App\Models\Article"
### per controllare lo status:
- php artisan scout:status