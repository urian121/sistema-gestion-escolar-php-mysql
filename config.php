<?php
// Definir mis Constante Globales
define('NAME_APP', 'sistema-gestion-escolar-php-mysql');

/**
 * BASE_PATH define una ruta del sistema de archivos en el servidor, útil para acceder a archivos y carpetas desde el backend. Ejemplo: '/var/www/html/'
 * Es solo accesible por el servidor y no se puede usar directamente como URL en el navegador.
 */
define('BASE_PATH', __DIR__ . '/'); // Salida: C:\laragon\www\sistema-gestion-escolar-php-mysql\
define('BASE_HOME', 'http://localhost/' . NAME_APP . '/');

/**
 * BASE_PATH_COMPONENTS define una ruta de sistema de archivos local que apunta a la carpeta "components" dentro del directorio actual. Ejemplo: '/var/www/html/components'
 * Es útil para incluir archivos PHP o acceder a recursos internos en el servidor, pero no se puede usar como URL en el navegador.
 */
define('BASE_PATH_COMPONENTS', __DIR__ . '/components');

/**
 * BASE_STATIC define una URL pública que usa el nombre del servidor y apunta a un directorio específico en el navegador.
 * Ejemplo: 'http://tu-dominio.com/sistema-gestion-escolar-php-mysql/'
 * Se utiliza para enlaces públicos y redirecciones, accesible directamente desde el navegador.
 */
define('BASE_STATIC', 'http://' . $_SERVER['SERVER_NAME'] . '/' . NAME_APP . '/');

/**
 * SETTINGS_BD define la ruta en el sistema de archivos hacia el archivo de configuración de la base de datos "settingBD.php" dentro de la carpeta "config".
 * Ejemplo: '/var/www/html/config/settingBD.php'
 * Este tipo de constante es útil para incluir archivos de configuración específicos en el backend y es inaccesible desde el navegador.
 */
define('SETTINGS_BD', __DIR__ . '/config/settingBD.php');
define('BASE_ACTIONS', 'http://' . $_SERVER['SERVER_NAME'] . '/' . NAME_APP . '/home/functions/actionsBD.php');
define('BASE_PATH_AVATAR_PROFESORES', BASE_PATH . '/assets/avatar_profesores');
define('BASE_PATH_AVATAR_ESTUDIANTES', BASE_PATH . '/assets/avatar_estudiantes');