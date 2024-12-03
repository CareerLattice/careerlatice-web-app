apt-get update
apt-get install -y libssl1.0-dev

composer install --optimize-autoloader --no-dev

chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
