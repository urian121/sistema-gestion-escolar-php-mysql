<?php
$typeAction = $_POST['action'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($typeAction) {
        include_once '../settings/config.php';
        include_once(SETTINGS_BD);
        include_once(CONTROLLER_GLOBAL);

        // Agregar o editar materia
        if ($typeAction == "addMateria" || $typeAction == "editMateria") {
            $materia = escapeData($_POST['nombre_materia'], $servidor);
            if ($typeAction == "addMateria") {
                $query = "INSERT INTO tbl_materias (nombre_materia) VALUES ('$materia')";
            } else {
                $id_materia = escapeData($_POST['id_materia'], $servidor);
                $query = "UPDATE tbl_materias SET nombre_materia = '$materia' WHERE id_materia = '$id_materia'";
            }
            echo executeQuery($servidor, $query, BASE_STATIC . 'home/materias/');
        }
    }
}



function getMaterias($servidor)
{
    $sql = "SELECT * FROM tbl_materias";
    $result = $servidor->query($sql);
    $materias = []; // Inicializar el array vacío
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row;
    }
    return $materias;
}



function  getMateria($servidor, $id_materia)
{
    $sql = "SELECT * FROM tbl_materias WHERE id_materia = '$id_materia'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
