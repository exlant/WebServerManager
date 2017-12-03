#!/bin/bash

git config core.fileMode false

## PHP
composer install
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan migrate
#php artisan db:seed
#php artisan queue:restart

## Set proper permissions to files and folders
#sudo chmod -R 0777 ./