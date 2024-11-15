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
    include_once(BASE_CONTROLLER_ESTUDIANTES);

    $estudiantes = getEstudiantes($servidor);

    $edit = isset($_GET['id_grado']);
    $cursoDetalles = $edit ? getCurso($servidor, $_GET['id_grado']) : [];
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <h2 class="text-center mt-3 mb-3">
                                                    <a href="../estudiantes/add.php" class="btn btn-primary float-start">
                                                        <li class="fa fa-plus"></li> Nuevo Estudiante
                                                    </a>
                                                    Lista de Estudiantes Total (<?php echo count($estudiantes); ?>)</strong>
                                                </h2>
                                                <div class="table-responsive">
                                                    <table id="tbl_estudiantes" class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Estudiante</th>
                                                                <th>Apellido</th>
                                                                <th>Email</th>
                                                                <th>Fecha Nacimiento</th>
                                                                <th>Dirección</th>
                                                                <th class="text-center">Perfil</th>
                                                                <th>Curso</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($estudiantes as $estudiante) : ?>
                                                                <tr>
                                                                    <td><?= $estudiante['nombre_estudiante']; ?></td>
                                                                    <td><?= $estudiante['apellido_estudiante']; ?></td>
                                                                    <td><?= $estudiante['email_estudiante']; ?></td>
                                                                    <td><?= $estudiante['fecha_nacimiento']; ?></td>
                                                                    <td><?= $estudiante['direccion_estudiante']; ?></td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        $avatar = empty($estudiante['perfil_estudiante'])
                                                                            ? BASE_STATIC . 'assets/images/sin-avatar.png'
                                                                            : BASE_STATIC . 'assets/avatar_estudiantes/' . $estudiante['perfil_estudiante'];
                                                                        ?>
                                                                        <img src="<?= $avatar; ?>" alt="<?= $estudiante['perfil_estudiante']; ?>" style="max-width: 35px; border-radius: 5px;">
                                                                    </td>
                                                                    <td><?= $estudiante['grado'] . ' - ' . $estudiante['jornada'] . ' - ' . $estudiante['seccion']; ?></td>
                                                                    <td class="text-center">
                                                                        <a class="btn btn-inverse-primary btn-sm" title="Detalles del Estudiante" href="./add.php?id_estudiante=<?= $estudiante['id_estudiante'] ?>" class="button small" aria-label="Editar Estudiante <?= $estudiante['nombre_estudiante'] ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                        </tbody>
                                                    </table>
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
        </div>
    </div>

    <?php include(BASE_PATH_COMPONENTS . '/footer.php'); ?>

</body>

</html>