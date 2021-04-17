# Fish Breeders Web Portal

# How We Started 

1. Installed required installation for laravel 8.x
    a. php version 7.4
    b. composer
    c. npm for node modules management (Styling , tailwind css) compiles our .scss files into css
    d. mysql database

2. Created Laravel(8.x) project from composer using command :
    composer create-project --prefer-dist laravel/laravel fishbreeders    




# Setup Process

1.  clone the repository from your command line :
    git clone https://github.com/surazneupane/fishbreeders.git

2.  cd fishbreeders

3.  composer install (installs required project for our project taking reference from composer.json file for eg: our project uses Socialite for gmail and fb login that is installed by composer install)

    --Package Used--
    laravel/socialite": "^5.2", ( for fb and gmail login)
    "livewire/livewire": "^2.4",(for async request in like and dislike)
    "pusher/pusher-php-server": "~4.0"(for bordcating of messages on chat)

4.  create new .env file and copy contents of  .env.example to .env

5.  setup database credintials on .env file

6.  for facebook login and gmail login setup app_id and app_secret provided by fb and gmail into .env .

7.  for bordcating of messages use pusher ID , Key , Secret and Cluseter in .env .

6.  php artisan key:generate.

7.  finally php artisan serve and you are ready to go from browser .
