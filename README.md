<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status">
<img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads">
<img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version">
<img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License">
</p>

# Lareval-GuestBook-Sample

This project uses the laravel framework, with functions such as database addition / editing / deletion and membership system.

## step 1:

Get this project.

Open command line enter this.

```
git clone https://github.com/90418139/Lareval-GuestBook-Sample.git
cd Lareval-GuestBook-Sample
composer install
cp .env.example .env
php artisan key:generate
``` 

Git not anwser? <a href='https://git-scm.com/'>Git</a>

Composer not answer? <a href='https://getcomposer.org/'>Composer</a>

## step 2:

Edit '.env'

```$xslt
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(your sql database name)
DB_USERNAME=(your sql username)
DB_PASSWORD=(your sql password)
```

## step 3:

Make sql table

You can use command line or by hand

    php artisan migrate
    
If you don't have sql server.you can install "<a href="https://www.apachefriends.org/download.html">XAMPP</a>".



## step 4:

Start project.

    php artisan serve

Finish!!
