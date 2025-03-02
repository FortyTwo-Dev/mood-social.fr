FROM php:7.4-apache

# Installer les extensions nécessaires pour PDO et MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_rewrite pour Apache (souvent utilisé dans les applications PHP)
RUN a2enmod rewrite