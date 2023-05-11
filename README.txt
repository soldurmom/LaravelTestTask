composer i
copy .env.example .env

// set your database params in .env file

php artisan key:generate
php artisan migrate
php artisan serve