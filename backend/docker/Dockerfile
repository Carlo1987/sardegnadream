FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies e Nginx
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    curl \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia i file del progetto Laravel
COPY . /var/www

# Copia configurazione php.ini per dimensione files
COPY ./docker/php.ini /usr/local/etc/php/conf.d/uploads.ini


# Copia configurazione Nginx
COPY ./docker/nginx.conf /etc/nginx/sites-available/default

# Permissions e ownership
RUN chown -R www-data:www-data /var/www \
    && chmod -R 777 /var/www

# Espone la porta HTTP
EXPOSE 80

# CMD per avviare sia php-fpm che nginx
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
