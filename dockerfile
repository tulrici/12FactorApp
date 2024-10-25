# Use the official PHP image with Apache
FROM php:8.2-apache

# Install necessary PHP extensions and tools
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy the application code to the container
COPY . .

# Set DocumentRoot to Symfony's 'public' directory
RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf

# Configure Apache to serve files from the 'public' directory with override rules
RUN echo "<Directory /var/www/html/public>\n\tOptions Indexes FollowSymLinks\n\tAllowOverride All\n\tRequire all granted\n</Directory>" \
    > /etc/apache2/conf-available/public-directory.conf \
    && a2enconf public-directory

# Set ServerName to avoid warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Set permissions on public directory
RUN chmod -R 755 /var/www/html/public

# Install Symfony dependencies
RUN composer install --no-scripts --no-interaction --optimize-autoloader

# Expose the default web server port
EXPOSE 80