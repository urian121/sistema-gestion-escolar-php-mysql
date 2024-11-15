<?php
// Función genérica para escapado de datos
function escapeData($data, $servidor)
{
    return mysqli_real_escape_string($servidor, trim($data));
}

// Función para manejar inserciones y actualizaciones
function executeQuery($servidor, $query, $redirect = null)
{
    if ($servidor->query($query) === TRUE) {
        if ($redirect) {
            header("Location: $redirect");
            exit;
        } else {
            return "correcto";
        }
    } else {
        return "Error: " . $servidor->error;
    }
}
