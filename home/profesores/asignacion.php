<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include_once '../../settings/config.php';
    include_once(BASE_PATH_COMPONENTS . '/head.php');
    ?>
</head>

<body>

    <?php
    include(BASE_PATH_COMPONENTS . '/loader.html');
    include_once(SETTINGS_BD);
    include_once(COMPONENTES_GLOBALES);
    include_once(BASE_CONTROLLER_PROFESORES);

    if (!isset($_GET['profesor']) || empty($_GET['profesor'])) {
        echo '<script>window.location = "../index.php";</script>';
        exit();
    }

    $id_profesor = $_GET['profesor'];
    $profeDetalles = getProfesor($servidor, $id_profesor);
    $mat_grados_profe = getMateriasPorCursoProfesor($servidor, $id_profesor);
    ?>

    <div class="container-scroller">
        <?php include(BASE_PATH_COMPONENTS . '/sidebar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(BASE_PATH_COMPONENTS . '/header.php'); ?>
            <div class="main-panel fade-in">
                <div class="content-wrapper pb-0 justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 stretch-card grid-margin">
                            <div class="card">
                                <h3 class="px-4 mt-3">
                                    <?php echo btn_volver(); ?>
                                    Profesor: <strong><?= $profeDetalles['nombre'] . ' ' . $profeDetalles['apellido'] ?></strong>
                                    <hr>
                                </h3>
                                <div class="card-body">
                                    <form action="<?= BASE_STATIC ?>profesores/recibe_asignacion.php" method="POST">
                                        <input type="hidden" name="id_profesor" value="<?= $id_profesor ?>">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>Seleccione el Curso
                                                    <hr>
                                                </h4>
                                                <ul class="list-group list-group-flush">
                                                    <?php
                                                    $mat_grados_profe = getMateriasPorCursoProfesor($servidor, $id_profesor);
                                                    foreach ($mat_grados_profe as $index => $curso) : ?>
                                                        <li class="list-group-item" id="li_curso_<?= $curso['id_grado']; ?>" onclick="document.getElementById('curso_<?= $index; ?>').click();">
                                                            <label for="curso_<?= $index; ?>" class="d-flex justify-content-between align-items-center cursor-pointer">
                                                                <span>
                                                                    <input class="custom_radio" type="radio" name="grados" id="curso_<?= $index; ?>" value="<?= $curso['id_grado'] ?>" style="cursor: pointer;">
                                                                    <?= $curso['grado'] . ' ' . $curso['jornada'] . ' ' . $curso['seccion'] ?>
                                                                </span>
                                                                <span class="float-end">Matriculas (<span id="total_materias_<?= $curso['id_grado']; ?>"><?= $curso['total_materias'] ?? 0 ?></span>)</span>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="col-md-8">
                                                <section id="cuerpo_materias"></section>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include(BASE_PATH_COMPONENTS . '/footer.php'); ?>
    <script src="<?= BASE_STATIC ?>assets/js/axios.min.js?v=<?= mt_rand() ?>"></script>
    <script src="<?= BASE_STATIC ?>assets/js/asignacion_curso_materias_profe.js?v=<?= mt_rand() ?>"></script>

</body>

</html>