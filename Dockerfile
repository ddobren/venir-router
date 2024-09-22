# Koristi PHP 8.1 kao osnovu
FROM php:8.1-cli

# Postavi radni direktorij unutar kontejnera
WORKDIR /var/www/html

# Instaliraj Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Kopiraj composer datoteke u radni direktorij
COPY composer.json composer.lock ./

# Instaliraj PHP ekstenzije (ako su potrebne, ovo zavisi od tvoje aplikacije)
RUN docker-php-ext-install pdo pdo_mysql

# Instaliraj Composer zavisnosti
RUN composer install --no-interaction --no-scripts --prefer-dist

# Kopiraj ostatak aplikacije
COPY . .

# Kreiraj autoload datoteke
RUN composer dump-autoload --optimize

# Izloži port 8000
EXPOSE 8000

# Pokreni PHP server
CMD ["php", "-S", "0.0.0.0:8000", "index.php"]
