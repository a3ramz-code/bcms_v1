FROM php:8.4-fpm

WORKDIR /var/www/html

RUN apt-get update
RUN apt-get install -y git unzip libpq-dev libzip-dev libonig-dev curl
RUN docker-php-ext-install -j$(nproc) pdo pdo_pgsql zip pcntl posix

# Install Composer (ambil dari image resmi)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy semua source lebih dulu (termasuk artisan)
COPY . /var/www/html
COPY . .

# Install deps (tanpa dev saat build)
#RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN composer install --no-interaction --prefer-dist --no-scripts

# Set permission
RUN chown -R www-data:www-data /var/www/html

CMD ["php-fpm"]
