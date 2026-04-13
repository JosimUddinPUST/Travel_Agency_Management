FROM php:8.2-cli

WORKDIR /var/www

# Install system dependencies + Node
RUN apt-get update && apt-get install -y \
    git unzip curl zip \
    libpng-dev libzip-dev libpq-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend (IMPORTANT for Laravel Vite)
RUN npm install && npm run build

# Laravel optimizations
RUN php artisan config:clear && php artisan cache:clear

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

# Run migrations + start server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000