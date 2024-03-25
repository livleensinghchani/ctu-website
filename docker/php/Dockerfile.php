FROM php:fpm-alpine

# Install MySQLi extension
RUN docker-php-ext-install mysqli
