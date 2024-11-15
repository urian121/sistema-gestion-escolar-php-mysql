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

    $profesores = getProfesores($servidor);

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
                                                    <a href="./add_profe.php?add_profe" class="btn btn-primary float-start">
                                                        <li class="fa fa-plus"></li> Nuevo Profesor
                                                    </a>
                                                    Lista de Profesores Total (<?php echo count($profesores); ?>)</strong>
                                                </h2>
                                                <div class="table-responsive">
                                                    <table id="tbl_profesores" class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nombre</th>
                                                                <th>Apellido</th>
                                                                <th>Identificación</th>
                                                                <th>Especialidad</th>
                                                                <th class="text-center">Perfil</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $count = 0;
                                                            foreach ($profesores as $profe) :
                                                                $count++; ?>
                                                                <tr id="profe_<?php echo $count; ?>">
                                                                    <td width="5%" class="text-center"><?= $profe['profesor_id']; ?></td>
                                                                    <td><?= $profe['profesor_nombre']; ?></td>
                                                                    <td><?= $profe['apellido']; ?></td>
                                                                    <td><?= $profe['identificacion']; ?></td>
                                                                    <td><?= $profe['especialidad']; ?></td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        $avatar = empty($profe['avatar_profesor'])
                                                                            ? BASE_STATIC . 'assets/images/sin-avatar.png'
                                                                            : BASE_STATIC . 'assets/avatar_profesores/' . $profe['avatar_profesor'];
                                                                        ?>
                                                                        <img src="<?= $avatar; ?>" alt="<?= $profe['profesor_nombre']; ?>" style="max-width: 35px;">
                                                                    </td>
                                                                    <td width="10%">
                                                                        <a title="Detalles del Profesor" class="btn btn-inverse-success btn-sm" title="Detalles del Profesor" href="./detalles.php?profe=<?= $profe['profesor_id'] ?>" class="button small" aria-label="Editar Materia <?= $profe['profesor_nombre'] ?>">
                                                                            <i class="fa fa-paper-plane-o"></i>
                                                                        </a>
                                                                        <a title="Editar Profesor" class="btn btn-inverse-primary btn-sm" href="./add_profe.php?edit_profe=<?= $profe['profesor_id'] ?>" class="button small" aria-label="Editar Materia <?= $profe['profesor_nombre'] ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a title="Asignar Materia" class="btn btn-inverse-warning btn-sm" href="./asignacion.php?profesor=<?= $profe['profesor_id'] ?>" class="button small warning" aria-label="Asignar Nuevo Curso <?= $profe['profesor_nombre'] ?>">
                                                                            <i class="fa fa-plus-circle"></i>
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