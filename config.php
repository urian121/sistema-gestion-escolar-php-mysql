<?php
define('BASE_PATH', __DIR__ . '/'); // Salida: C:\laragon\www\sistema-gestion-escolar-php-mysql\
//define('BASE_PATH', __DIR__ . '/../');
define('BASE_PATH_COMPONENTS', __DIR__ . '/components');
define('BASE_STATIC', 'http://' . $_SERVER['SERVER_NAME'] . '/sistema-gestion-escolar-php-mysql/');
define('SETTINGS_BD', __DIR__ . '/config/settingBD.php');
//define('SETTINGS_BD', 'http://' . $_SERVER['SERVER_NAME'] . '/sistema-gestion-escolar-php-mysql/config/settingBD.php');
define('BASE_ACTIONS', 'http://' . $_SERVER['SERVER_NAME'] . '/sistema-gestion-escolar-php-mysql/home/functions/actionsBD.php');