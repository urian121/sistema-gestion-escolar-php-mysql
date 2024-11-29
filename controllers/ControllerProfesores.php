<?php
$typeAction = $_POST['action'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($typeAction) {
        include_once '../settings/config.php';
        include_once(SETTINGS_BD);
        include_once(CONTROLLER_GLOBAL);

        // Agregar o editar Profesor
        if ($typeAction == "addProfesor" || $typeAction == "editProfesor") {
            // Escapar datos
            $nombre = escapeData($_POST['nombre'], $servidor);
            $apellido = escapeData($_POST['apellido'], $servidor);
            $identificacion = escapeData($_POST['identificacion'], $servidor);
            $especialidad = escapeData($_POST['especialidad'], $servidor);
            $id_profesor = $typeAction == "editProfesor" ? escapeData($_POST['id_profesor'], $servidor) : null;

            // Manejo de avatar
            $avatar_profesor = "";
            if (isset($_FILES['avatar_profesor']) && $_FILES['avatar_profesor']['error'] == UPLOAD_ERR_OK) {
                $extension = strtolower(pathinfo($_FILES['avatar_profesor']['name'], PATHINFO_EXTENSION));
                $avatar_profesor = substr(md5(uniqid(rand())), 0, 20) . ".$extension";
                move_uploaded_file($_FILES['avatar_profesor']['tmp_name'], BASE_PATH_AVATAR_PROFESORES . "/$avatar_profesor");
            }

            // Construcción de la consulta
            $query = $typeAction == "addProfesor"
                ? "INSERT INTO tbl_profesores (nombre, apellido, identificacion, especialidad, avatar_profesor) 
           VALUES ('$nombre', '$apellido', '$identificacion', '$especialidad', '$avatar_profesor')"
                : "UPDATE tbl_profesores SET
           nombre = '$nombre',
           apellido = '$apellido',
           identificacion = '$identificacion',
           especialidad = '$especialidad'" .
                ($avatar_profesor ? ", avatar_profesor = '$avatar_profesor'" : "") .
                " WHERE id_profesor = '$id_profesor'";

            // Ejecutar consulta
            echo executeQuery($servidor, $query,  BASE_STATIC . 'home/profesores/');
        }
    }
}


function getMateriasProfesor($servidor, $id_profesor)
{
    $sql = "SELECT m.nombre_materia  FROM tbl_materias AS m
    INNER JOIN tbl_profesores_materias AS pm
    ON m.id_materia = pm.id_materia
     WHERE pm.id_profesor = '$id_profesor'";
    $result = $servidor->query($sql);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row['nombre_materia'];
    }
    return $materias;
}

function getMateriasPorCursoProfesor($servidor, $id_profesor)
{
    $sql = "SELECT 
        c.id_grado, 
        c.grado,
        c.jornada, 
        c.seccion,
        COUNT(m.id_materia) AS total_materias
    FROM tbl_grados AS c
    LEFT JOIN tbl_profesores_materias AS pm 
    ON c.id_grado = pm.id_grado 
    AND pm.id_profesor = '$id_profesor'
    LEFT JOIN tbl_materias AS m ON m.id_materia = pm.id_materia
    GROUP BY c.id_grado";
    $result = $servidor->query($sql);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row;
    }
    return $materias;
}


function getProfesores($servidor)
{
    $sql =
        "SELECT 
        p.id_profesor AS profesor_id, 
        p.nombre AS profesor_nombre,
        p.apellido,
        p.identificacion,
        p.especialidad,
        p.avatar_profesor
      FROM tbl_profesores AS p";
    $result = $servidor->query($sql);
    $profesores = [];
    while ($row = $result->fetch_assoc()) {
        $profesores[] = $row;
    }
    return $profesores;
}


function getProfesor($servidor, $profesor)
{
    $sql = "SELECT * FROM tbl_profesores WHERE id_profesor = '$profesor'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


function getGradosProfesor($servidor, $id_profesor)
{
    $sql = "SELECT 
      c.id_grado, c.grado,
      c.jornada, c.seccion FROM tbl_grados AS c
    INNER JOIN tbl_profesores_materias AS pm 
    ON c.id_grado = pm.id_grado 
    WHERE id_profesor = '$id_profesor'";
    $result = $servidor->query($sql);
    $grados = [];
    while ($row = $result->fetch_assoc()) {
        $grados[] = $row;
    }
    return $grados;
}


function getMateriasCursoProfesor($servidor, $id_profesor, $id_grado)
{
    $sql = "SELECT id_materia FROM tbl_profesores_materias WHERE id_profesor='$id_profesor' AND id_grado='$id_grado'";
    $result = $servidor->query($sql);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row['id_materia']; 
    }
    return $materias;
}
