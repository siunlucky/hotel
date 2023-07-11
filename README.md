## Web Hotel 

Website CRUD Hotel dengan framework Laravel

## Cloning the repository

```bash
git clone https://github.com/siunlucky/hotel.git
```
## Install packages

```bash
npm i
```
and
```bash
composer install
```

# Setup .env file

Copy and rename file .env.example to .env and find ``DB_DATABASE=laravel`` change to ``DB_DATABASE=hotel``

## Generate app key

```bash
php artisan key:generate
```

## Run Migration

```bash
php artisan migrate
```

```bash
php artisan migrate:fresh --seed
```

## Start the app

```bash
npm run dev --watch
```
and
```bash
php artisan serve
```

## Access the website

Homepage:
```bash
http://127.0.0.1:8000/hotel
```

Login Admin
```bash
http://127.0.0.1:8000/hotel/login
```

Input the default Id Password for access dashboard admin

Admin </b>
Id : admin
password : admin

Receptionist </b>
Id : receptionist
password : receptionist


Dashboard Admin
```bash
http://127.0.0.1:8000/hotel/admin/dashboard
```

Dashboard Receptionist
```bash
http://127.0.0.1:8000/hotel/receptionist/dashboard
```

