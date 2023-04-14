#!/bin/sh

# Install PHP dependencies with Composer
composer update
composer install --no-progress --no-suggest --no-interaction --prefer-dist --optimize-autoloader

# Generate a new application key
php artisan key:generate

# Run database migrations
php artisan migrate --force

# Generate Passport encryption keys
php artisan passport:keys --force

# Install NPM packages and compile assets
npm install
npm run dev

# Start the web server
apache2-foreground
