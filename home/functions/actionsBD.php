<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../functions/settings.php');
require_once('../config/settingBD.php');


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

$typeAction = $_POST['action'] ?? null;
if ($typeAction) {

    // Agregar o editar materia
    if ($typeAction == "addMateria" || $typeAction == "editMateria") {
        $materia = escapeData($_POST['nombre_materia'], $servidor);
        if ($typeAction == "addMateria") {
            $query = "INSERT INTO tbl_materias (nombre_materia) VALUES ('$materia')";
        } else {
            $id_materia = escapeData($_POST['id_materia'], $servidor);
            $query = "UPDATE tbl_materias SET nombre_materia = '$materia' WHERE id_materia = '$id_materia'";
        }
        echo executeQuery($servidor, $query, $base_static . 'home/materias/');
    }

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
        echo executeQuery($servidor, $query,  $base_static . 'home/cursos/');
    }

    # Agregar o editar Estudiante
    if ($typeAction == "addEstudiante" || $typeAction == "editEstudiante") {
        $nombre_estudiante = escapeData($_POST['nombre_estudiante'], $servidor);
        $apellido_estudiante = escapeData($_POST['apellido_estudiante'], $servidor);
        $email_estudiante = escapeData($_POST['email_estudiante'], $servidor);
        $fecha_nacimiento = escapeData($_POST['fecha_nacimiento'], $servidor);
        $direccion_estudiante = escapeData($_POST['direccion_estudiante'], $servidor);
        $id_curso = escapeData($_POST['id_curso'], $servidor);
        $id_estudiante = $typeAction == "editEstudiante" ? escapeData($_POST['id_estudiante'], $servidor) : null;

        $perfil_estudiante = "";
        if (isset($_FILES['perfil_estudiante']) && $_FILES['perfil_estudiante']['error'] == UPLOAD_ERR_OK) {
            $extension = strtolower(pathinfo($_FILES['perfil_estudiante']['name'], PATHINFO_EXTENSION));
            $perfil_estudiante = substr(md5(uniqid(rand())), 0, 20) . ".$extension";
            move_uploaded_file($_FILES['perfil_estudiante']['tmp_name'],  $base_path . "assets/avatar_estudiantes/$perfil_estudiante");
        }

        if (
            $typeAction == "addEstudiante"
        ) {
            $query = "INSERT INTO tbl_estudiantes (nombre_estudiante, apellido_estudiante, email_estudiante, fecha_nacimiento, direccion_estudiante, perfil_estudiante, id_curso) VALUES ('$nombre_estudiante', '$apellido_estudiante', '$email_estudiante', '$fecha_nacimiento', '$direccion_estudiante', '$perfil_estudiante', '$id_curso')";
        } else {
            $query = "UPDATE tbl_estudiantes SET 
            nombre_estudiante = '$nombre_estudiante',
            apellido_estudiante = '$apellido_estudiante',
            email_estudiante = '$email_estudiante',
            fecha_nacimiento = '$fecha_nacimiento',
            id_curso = '$id_curso',
            direccion_estudiante = '$direccion_estudiante'" .
            ($perfil_estudiante ? ", perfil_estudiante = '$perfil_estudiante'" : "") .
            " WHERE id_estudiante = '$id_estudiante'";
        }

        echo executeQuery($servidor, $query,  $base_static . 'home/estudiantes/');
    }
    
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
            move_uploaded_file($_FILES['avatar_profesor']['tmp_name'], $base_path . "assets/avatar_profesores/$avatar_profesor");
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
        echo executeQuery($servidor, $query,  $base_static . 'home/profesores/');
    }

}
