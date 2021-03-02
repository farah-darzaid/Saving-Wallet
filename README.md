# Saving Wallet
#### INGOT BROKERS ASSIGNMENT

## Introduction

* Application name: Saving Wallet.
* App development environment:
    * PHP 7.2.5
    * Laravel 7.29
---
## Installation
Clone this repository:
```sh
git clone https://github.com/farah-darzaid/Saving-Wallet.git
```

Go inside project folder:
```sh
cd Saving-Wallet
```

Install dependencies:
```sh
composer install
```

Generate encryption key:
```sh
php artisan key:generate
```

* Rename .env.example to .env and edit to math your configuration.
* Create new schema and name it whatever you want, but remember to reflect this in .env file.
* Run migrations to create tables and indexes:
```sh
php artisan migrate:fresh
```
* Run seeds to populate data:
 ```sh
 php artisan db:seed
 ```
* in a new terminal install dependencies for templates design:
```sh
npm install & npm run dev
```
---

# Using the app
* Start a PHP server, by running this command:
```sh
php artisan serve
Laravel development server started: http://127.0.0.1:8000
 ```
 
 * If you run the seeds, then you can login by either these two users: 
    * Users:
        * user role:
            * Email: user@localhost.com
            * password: user12345 
            
        * admin role:
            * Email: admin@localhost.com
            * password: admin12345

