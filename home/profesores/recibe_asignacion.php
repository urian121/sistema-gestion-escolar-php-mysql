<?php
include_once '../../settings/config.php';
include_once(SETTINGS_BD);
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);

$id_profesor = $data['id_profesor'];
$id_grado    = $data['id_grado'];
$id_materias = $data['idMaterias'];
$response = []; // Array para almacenar la respuesta

// Primero, eliminar todas las materias del profesor para el curso específico
$delete = "DELETE FROM `tbl_profesores_materias` WHERE `id_profesor` = $id_profesor AND `id_grado` = $id_grado";
$result = $servidor->query($delete);
if (!$result) {
    $response['mensaje'] = "Error: " . $servidor->error . " en la consulta: " . $delete;
    echo json_encode($response);
    exit();
}

// Ahora, agregar las materias seleccionadas
for ($i = 0; $i < count($id_materias); $i++) {
    $sql = "REPLACE INTO `tbl_profesores_materias` (`id_profesor`, `id_materia`, `id_grado`) VALUES ($id_profesor, $id_materias[$i], $id_grado)";
    $result = $servidor->query($sql);

    if (!$result) {
        $response['mensaje'] = "Error: " . $servidor->error . " en la consulta: " . $sql;
        echo json_encode($response);
        exit();
    }
}

// Respuesta exitosa
$response['mensaje'] = "Ok";
echo json_encode($response);
exit();
