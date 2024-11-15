<?php
$typeAction = $_POST['action'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($typeAction) {
        include_once '../settings/config.php';
        include_once(SETTINGS_BD);
        include_once(CONTROLLER_GLOBAL);


        # Agregar o editar Estudiante
        if ($typeAction == "addEstudiante" || $typeAction == "editEstudiante") {
            $nombre_estudiante = escapeData($_POST['nombre_estudiante'], $servidor);
            $apellido_estudiante = escapeData($_POST['apellido_estudiante'], $servidor);
            $email_estudiante = escapeData($_POST['email_estudiante'], $servidor);
            $fecha_nacimiento = escapeData($_POST['fecha_nacimiento'], $servidor);
            $direccion_estudiante = escapeData($_POST['direccion_estudiante'], $servidor);
            $id_grado = escapeData($_POST['id_grado'], $servidor);
            $id_estudiante = $typeAction == "editEstudiante" ? escapeData($_POST['id_estudiante'], $servidor) : null;

            $perfil_estudiante = "";
            if (isset($_FILES['perfil_estudiante']) && $_FILES['perfil_estudiante']['error'] == UPLOAD_ERR_OK) {
                $extension = strtolower(pathinfo($_FILES['perfil_estudiante']['name'], PATHINFO_EXTENSION));
                $perfil_estudiante = substr(md5(uniqid(rand())), 0, 20) . ".$extension";
                move_uploaded_file($_FILES['perfil_estudiante']['tmp_name'], BASE_PATH_AVATAR_ESTUDIANTES . "/$perfil_estudiante");
            }

            if (
                $typeAction == "addEstudiante"
            ) {
                $query = "INSERT INTO tbl_estudiantes (nombre_estudiante, apellido_estudiante, email_estudiante, fecha_nacimiento, direccion_estudiante, perfil_estudiante, id_grado) VALUES ('$nombre_estudiante', '$apellido_estudiante', '$email_estudiante', '$fecha_nacimiento', '$direccion_estudiante', '$perfil_estudiante', '$id_grado')";
            } else {
                $query = "UPDATE tbl_estudiantes SET 
            nombre_estudiante = '$nombre_estudiante',
            apellido_estudiante = '$apellido_estudiante',
            email_estudiante = '$email_estudiante',
            fecha_nacimiento = '$fecha_nacimiento',
            id_grado = '$id_grado',
            direccion_estudiante = '$direccion_estudiante'" .
                    ($perfil_estudiante ? ", perfil_estudiante = '$perfil_estudiante'" : "") .
                    " WHERE id_estudiante = '$id_estudiante'";
            }

            echo executeQuery($servidor, $query,  BASE_STATIC . 'home/estudiantes/');
        }
    }
}



function getEstudiantes($servidor)
{
    $sql =
        "SELECT tbl_a.*, tbl_c.* 
      FROM tbl_estudiantes AS tbl_a
      INNER JOIN tbl_grados AS tbl_c 
      ON tbl_a.id_grado = tbl_c.id_grado";
    $result = $servidor->query($sql);
    $estudiantes = []; // Inicializar el array vacío
    while ($row = $result->fetch_assoc()) {
        $estudiantes[] = $row;
    }
    return $estudiantes;
}

function getEstudiante($servidor, $id_estudiante)
{
    $sql = "SELECT * FROM tbl_estudiantes WHERE id_estudiante = '$id_estudiante'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
