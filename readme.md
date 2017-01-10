<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## Installation steps

The first thing you should do is set the database connection parameters:

#### In config/database.php 

* Go to 'connections'
    * to 'mysql'
        * in 'database' => env('DB_DATABASE', 'database_example') set the parameter "database_example" as the name of your database
        * in 'username' => env('DB_USERNAME', 'user_example'), set the parameter "user_example" as the user of your "MySQL" enviroment
        * in 'password' => env('DB_PASSWORD', 'pass_example'), set the parameter "pass_example" as the password of your "MySQL" enviroment

#### In /.env

 * set the "DB_DATABASE" variable as the name of your database
 * set the "DB_USERNAME" variable as the user of your "MySQL" enviroment
 * set the "DB_PASSWORD" variable as the password of your "MySQL" enviroment
 
#### In /.env.example

* set the "DB_DATABASE" variable as the name of your database
* set the "DB_USERNAME" variable as the user of your "MySQL" enviroment
* set the "DB_PASSWORD" variable as the password of your "MySQL" enviroment


## Starting laravel

Once setted the database configuration you should open a command prompt on the root of laravel folder and type : "php artisan serve"
this will start the local server

## Migrating database

Once started the server you can use the migrate functionality of Laravel to set the tables you are going to use for this project
open a new command prompt on the root folder of laravel and type "php artisan migrate" and done! 


