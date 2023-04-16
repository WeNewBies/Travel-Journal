FROM php:8.1-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
        git \
        libzip-dev \
        zip \
        unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files into the container
COPY . /var/www/html

# Set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Change ownership of the storage directory
RUN chown -R www-data:www-data /var/www/html/storage

# Set permissions for storage and bootstrap/cache folders
RUN chgrp -R www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

# Install envsubst
RUN apt-get update && \
    apt-get install -y gettext-base

# Copy init.sql and entrypoint.sh files
COPY init.sql /docker-entrypoint-initdb.d/
COPY entrypoint.sh /usr/local/bin/

# Set up entrypoint
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]

# Start Apache
CMD ["apache2-foreground"]
