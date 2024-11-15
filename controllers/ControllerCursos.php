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
                $query = "INSERT INTO tbl_cursos (grado, jornada, seccion) VALUES ('$grado', '$jornada', '$seccion')";
            } else {
                $id_curso = escapeData($_POST['id_curso'], $servidor);
                $query = "UPDATE tbl_cursos SET grado = '$grado', jornada = '$jornada', seccion = '$seccion' WHERE id_curso = '$id_curso'";
            }
            echo executeQuery($servidor, $query,  BASE_STATIC . 'home/cursos/');
        }
    }
}


function getCurso($servidor, $id_curso)
{
    $sql = "SELECT * FROM tbl_cursos WHERE id_curso = '$id_curso'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


function getCursos($servidor)
{
    $sql = "SELECT * FROM tbl_cursos";
    $result = $servidor->query($sql);
    $cursos = []; // Inicializar el array vacío
    while ($row = $result->fetch_assoc()) {
        $cursos[] = $row;
    }
    return $cursos;
}
