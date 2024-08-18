#!/bin/sh

# Change to the project directory. Replace '/home/username/public_html' with your actual cPanel project path.
cd /home/sites/38b/4/4dca8d7566/app.rajahunain.site

# Pull the latest changes from the git repository
git pull origin main

# Install/update composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

# Run database migrations with fresh option and seed the database
php artisan migrate --seed --force

# Clear caches
php artisan cache:clear

# Clear and cache routes
php artisan route:cache

# Clear and cache config
php artisan config:cache

# Clear and cache views
php artisan view:cache

# Set proper file permissions (optional but recommended)
# chown -R username:username /home/username/public_html
# chmod -R 755 /home/username/public_html
# chmod -R 775 /home/username/public_html/storage
# chmod -R 775 /home/username/public_html/bootstrap/cache
