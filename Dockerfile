FROM php:7.4-apache

# Install ekstensi yang dibutuhkan CodeIgniter 3
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Aktifkan mod_rewrite untuk .htaccess CI3
RUN a2enmod rewrite

# Set document root ke folder root project
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set permission
RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html