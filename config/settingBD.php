<?php

// Conexión a la base de datos usando las constantes definidas
$servidor = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verificar conexión
if ($servidor->connect_error) {
    die("Error de conexión: " . $servidor->connect_error);
}

// Configurar el charset a utf8mb4 para aceptar caracteres especiales
if (!$servidor->set_charset("utf8mb4")) {
    die("Error cargando el conjunto de caracteres utf8mb4: " . $servidor->error);
} else {
    //echo "Conexión exitosa con charset utf8mb4";
}
