#!/bin/sh

set -e

# Start MySQL service
service mysql start

# Wait for MySQL to start
until mysqladmin ping -hmysql -uroot -p"${DB_PASSWORD}" --silent; do
    echo "Waiting for MySQL to start..."
    sleep 1
done

# Create the database and user
mysql -hmysql -uroot -p"${DB_PASSWORD}" <<EOF
CREATE DATABASE mydatabase;
CREATE USER 'myuser'@'%' IDENTIFIED BY 'mypassword';
GRANT ALL PRIVILEGES ON mydatabase.* TO 'myuser'@'%';
FLUSH PRIVILEGES;
EOF

# Install PHP dependencies with Composer
composer install

# Generate a new application key
php artisan key:generate

# Run database migrations
php artisan migrate --force

# Generate Passport encryption keys
php artisan passport:keys --force

# Start the application with the correct configuration
php artisan serve --host=${DB_HOST} --port=8000

# Install NPM packages and compile assets
npm install
npm run dev

# Start the web server
apache2-foreground
