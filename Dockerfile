# Koristi PHP 8.1 kao osnovu
FROM php:8.1-cli

# Postavi radni direktorij unutar kontejnera
WORKDIR /var/www/html

# Instaliraj potrebne PHP ekstenzije
RUN docker-php-ext-install pdo pdo_mysql

# Instaliraj Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Kopiraj composer datoteke i instaliraj ovisnosti
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-scripts --prefer-dist

# Kopiraj ostatak aplikacije
COPY . .

# Kreiraj optimizirani autoload
RUN composer dump-autoload --optimize

# Izloži port 8000
EXPOSE 8000

# Pokreni PHP server
CMD ["php", "-S", "0.0.0.0:8000", "index.php"]
