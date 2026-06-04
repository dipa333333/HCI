FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    && docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN cp .env.example .env

RUN php artisan key:generate

RUN chmod -R 777 storage bootstrap/cache

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}