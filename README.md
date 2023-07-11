## Web Hotel 

Website CRUD Hotel dengan framework Laravel

## Cloning the repository

``dash
git clone https://github.com/siunlucky/hotel.git
``
## Install packages

``dash
npm i
``
and
``dash
composer install
``

# Setup .env file

Copy and rename file .env.example to .env and find ``dash DB_DATABASE=laravel `` change it to ``dash DB_DATABASE=hotel``

## Generate app key

``dash
php artisan key:generate
``

## Run Migration

``dash
php artisan migrate
``

``
php artisan migrate:fresh --seed
``

## Start the app

``dash
npm run dev --watch
``
and
``dash
php artisan serve
``

## Access the website

Homepage:
``dash
http://127.0.0.1:8000/hotel
``

Login Admin
``dash
http://127.0.0.1:8000/hotel/login
``

Input the default Id Password for access dashboard admin

Admin </b>
Id : admin
password : admin

Receptionist </b>
Id : receptionist
password : receptionist


Dashboard Admin
``dash
http://127.0.0.1:8000/hotel/admin/dashboard
``

Dashboard Receptionist
``dash
http://127.0.0.1:8000/hotel/receptionist/dashboard
``

