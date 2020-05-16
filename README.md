<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status">
<img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads">
<img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version">
<img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License">
</p>

#Lareval-GuestBook-Sample

##step 1:

Install Laravel 7 first!!

<a href="https://laravel.com/docs/7.x/installation">Installation</a> Or do this if you know what it.

```
composer global require laravel/installer
laravel new blog
cd blog
composer require laravel/ui
php artisan ui vue --auth
```

##step 2:
Git this project to cover.

    git clone https://github.com/90418139/Lareval-GuestBook-Sample.git

Edit '.env'

```$xslt
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(your sql database name)
DB_USERNAME=(your sql username)
DB_PASSWORD=(your sql password)
```

##step 3:

Make sql table

You can use cmdline or by hand

    php artisan migrate
    
If you don't have sql server.you can install "<a href="https://www.apachefriends.org/download.html">XAMPP</a>".



##step 4:

Start project.

    php artisan serve

Finish!!
