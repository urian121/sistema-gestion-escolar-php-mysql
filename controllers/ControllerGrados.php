<?php
$typeAction = $_POST['action'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($typeAction) {
        include_once '../settings/config.php';
        include_once(SETTINGS_BD);
        include_once(CONTROLLER_GLOBAL);

        // Agregar o editar curso
        if ($typeAction == "addCurso" || $typeAction == "editCurso") {
            $grado = escapeData($_POST['grado'], $servidor);
            $jornada = escapeData($_POST['jornada'], $servidor);
            $seccion = escapeData($_POST['seccion'], $servidor);

            if ($typeAction == "addCurso") {
                $query = "INSERT INTO tbl_grados (grado, jornada, seccion) VALUES ('$grado', '$jornada', '$seccion')";
            } else {
                $id_grado = escapeData($_POST['id_grado'], $servidor);
                $query = "UPDATE tbl_grados SET grado = '$grado', jornada = '$jornada', seccion = '$seccion' WHERE id_grado = '$id_grado'";
            }
            echo executeQuery($servidor, $query,  BASE_STATIC . 'home/grados/');
        }
    }
}


function getCurso($servidor, $id_grado)
{
    $sql = "SELECT * FROM tbl_grados WHERE id_grado = '$id_grado'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


function getGrados($servidor)
{
    $sql = "SELECT * FROM tbl_grados";
    $result = $servidor->query($sql);
    $grados = []; // Inicializar el array vacío
    while ($row = $result->fetch_assoc()) {
        $grados[] = $row;
    }
    return $grados;
}
