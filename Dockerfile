FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo_mysql mbstring xml zip \
    && a2enmod rewrite

COPY . /var/www/html
WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Permissions Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Forcer DocumentRoot sur /public
# Dockerfile
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Met à jour la config Apache pour prendre en compte le nouveau DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Active rewrite module
RUN a2enmod rewrite
EXPOSE 80
CMD ["apache2-foreground"]