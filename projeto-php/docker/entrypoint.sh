#!/bin/bash
set -e

echo "Aguardando MySQL..."
while ! php -r "new PDO('mysql:host=mysql;port=3306;dbname=catalogo', 'laravel', 'secret');" 2>/dev/null; do
    sleep 1
done
echo "MySQL disponível."

php artisan migrate --force
php artisan config:cache
php artisan route:cache

exec php-fpm
