<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include_once('../../config.php');
    include_once('../functions/settings.php');
    include_once(BASE_PATH_COMPONENTS . '/head.php');
    ?>
</head>

<body>
    <?php
    include(BASE_PATH_COMPONENTS . '/loader.html');

    include_once($base_path . 'config/settingBD.php');
    include_once($base_path . "functions/funciones.php");

    if (isset($_GET['profe']) || !empty($_GET['profe'])) {
        $profeDetalles = getProfesor($servidor, $_GET['profe']) ?? [];
    } else {
        echo "<script>window.location='./';</script>";
        exit;
    }
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
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <?php echo btn_volver('./'); ?>

                                            <h4 class="card-title mb-3">
                                                Detalles de Profesor:
                                                <?= $profeDetalles['nombre'] . ' ' . $profeDetalles['apellido']; ?>
                                                <hr>
                                            </h4>

                                            <div class="form-group">
                                                <label for="Nombre del Profesor">Nombre del Profesor</label>
                                                <input type="text" name="nombre" value="<?= $profeDetalles['nombre'] ?>" disabled class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Apellido del Profesor">Apellido del Profesor</label>
                                                <input type="text" name="apellido" value="<?= $profeDetalles['apellido'] ?>" disabled class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Identificación del Profesor">Identificación del Profesor</label>
                                                <input type="text" name="identificacion" value="<?= $profeDetalles['identificacion'] ?>" disabled class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Especialidad del Profesor">Especialidad del Profesor</label>
                                                <input type="text" name="especialidad" value="<?= $profeDetalles['especialidad'] ?>" disabled class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Imagen actual<br>
                                                    <?php
                                                    $avatar = empty($profeDetalles['avatar_profesor'])
                                                        ? '../assets/img/sin-avatar.png'
                                                        : '../assets/avatar_profesores/' . $profeDetalles['avatar_profesor'];
                                                    ?>
                                                    <img src="<?= $avatar; ?>" alt="<?= $profeDetalles['nombre']; ?>" style="max-width: 50px; border-radius: 5%;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h4 class="text-center">Información del Curso
                                                <hr>
                                            </h4>
                                            <ul class="list-group list-group-flush">
                                                <?php
                                                $count = 0;
                                                $cursosProfe = getCursosProfesor($servidor, $profeDetalles['id_profesor']);
                                                foreach ($cursosProfe as $curso) {
                                                    $count++;
                                                    echo '<li class="list-group-item">' .  $count . '. ' . $curso['grado'] . ', ' . $curso['jornada'] . ', ' . $curso['seccion'] . '</li>';
                                                }
                                                ?>
                                                </ol>
                                        </div>
                                        <div class="col-md-4">
                                            <h4 class="text-center">Materias Asignadas
                                                <hr>
                                            </h4>
                                            <ul class="list-group list-group-flush">
                                                <?php
                                                $count = 0;
                                                $materiasProfesor = getMateriasProfesor($servidor, $profeDetalles['id_profesor']);
                                                foreach ($materiasProfesor as $materia) {
                                                    $count++;
                                                    echo '<li class="list-group-item">' .  $count . '. ' . $materia . '</li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include(BASE_PATH_COMPONENTS . '/footer.php'); ?>

</body>

</html>