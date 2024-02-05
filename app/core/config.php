<?php
/*
* App Information
*/
define("APP_NAME","Udemy Application");
define("APP_DESC","Udemy is a LMS application. It provide a free or paid course.");

/*
* Database config
*/
if($_SERVER['SERVER_NAME'] == 'udemy.test'){
    //database config for local server
    define('DB_HOST','localhost');
    define('DB_NAME','udemy_db');
    define('DB_USER','himel');
    define('DB_PASSWORD','admin@123');
    define('DB_DRIVER','mysql');

}else{
    //database config for live server
    define('DB_HOST','localhost');
    define('DB_NAME','udemy_db');
    define('DB_USER','himel');
    define('DB_PASSWORD','admin@123');
    define('DB_DRIVER','mysql');

}