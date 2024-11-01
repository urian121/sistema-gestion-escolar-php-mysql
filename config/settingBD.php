<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ModoDesarrollo = true;
if ($ModoDesarrollo) {
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "bd_sistema_gestion_escolar";
} else {
    $host = "bases.edumedia.tech";
    $usuario = "edumedia_adm_tb";
    $contrasena = "TboardAdmin-123*";
    $base_de_datos = "edumedia_adm_tb";
}

$servidor = new mysqli($host, $usuario, $contrasena, $base_de_datos);
if ($servidor->connect_error) {
    die("Error de conexión: " . $servidor->connect_error);
} else {
    //echo "Conexión exitosa";
}
