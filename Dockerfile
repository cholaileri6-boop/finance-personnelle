FROM php:8.2-apache

# Installer extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier le projet
COPY . /var/www/html

# Définir le dossier public comme racine
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer Laravel
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage

EXPOSE 80