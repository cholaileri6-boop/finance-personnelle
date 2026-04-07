# Étape 1 : image PHP + Apache
FROM php:8.2-apache

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    zip unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    && docker-php-ext-install pdo_mysql mbstring xml zip \
    && a2enmod rewrite

# Copier le projet
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Permissions pour Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port Apache
EXPOSE 80

# Lancer Apache
CMD ["apache2-foreground"]