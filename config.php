 <?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/courierng/');
define('LIBS', 'libs/');
define('UTILS', 'util/');
define('NAME', 'COURIER NG');
define('ABOUT', 'JUST COURIER NG USED TO BE F CORNER');
define('ROOT',dirname(__FILE__));

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'courierng');
define('DB_USER', 'root');
define('DB_PASS', '');

// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'rinnaswillruletheworldtomorrowmaybe');

// This is for database passwords only
define('HASH_PASSWORD_KEY', '10-9-8-7-6-5-4-3-2-1hereisrinnasyourall');
