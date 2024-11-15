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
    include_once(BASE_CONTROLLER_MATERIAS);

    $materias = getMaterias($servidor);

    $edit = isset($_GET['id_materia']);
    $materiDetalles = $edit ? getMateria($servidor, $_GET['id_materia']) : [];
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php if ($edit):
                                                echo btn_volver();
                                            endif; ?>

                                            <h2 class="mt-3 text-center mb-5">
                                                <?= $edit ? 'Editar Materia' : 'Registrar Nueva Materia' ?>
                                                <hr>
                                            </h2>

                                            <form class="forms-sample" method="POST" action="<?= POST_FORM_MATERIA; ?>" autocomplete="off">
                                                <input type="hidden" name="action" value="<?= $edit ? 'editMateria' : 'addMateria' ?>">
                                                <input type="hidden" name="id_materia" value="<?= $edit ? $materiDetalles['id_materia'] : '' ?>">
                                                <div class="form-group">
                                                    <label for="Nombre de la Materia">Nombre de la Materia</label>
                                                    <input type="text" name="nombre_materia" value="<?= $edit ? $materiDetalles['nombre_materia'] : '' ?>" required class="form-control">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary me-2">
                                                        <?= $edit ? 'Guardar Cambios' : 'Crear NuevaMateria' ?>
                                                    </button>
                                                    <?php echo btn_cancelar(BASE_HOME);
                                                    ?>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="col-md-8">
                                            <h2 class="text-center">Lista de Materias Total (<?= count($materias); ?>)</h2>
                                            <hr>
                                            <div class="table-responsive">
                                                <table id="tbl_materias" class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre de la Materia</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($materias as $materia) : ?>
                                                            <tr <?= $edit && $materia['id_materia'] == $materiDetalles['id_materia'] ? 'style="background-color: #c2c2c2;"' : '' ?>>
                                                                <td width="5%" class="text-center"><?= $materia['id_materia']; ?></td>
                                                                <td><?= $materia['nombre_materia']; ?></td>
                                                                <td width="10%" class="text-center">
                                                                    <a class="btn btn-inverse-primary btn-sm" href="./?id_materia=<?= $materia['id_materia'] ?>" class="button small" aria-label="Editar Materia <?= $materia['nombre_materia'] ?>">
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


    <?php include(BASE_PATH_COMPONENTS . '/footer.php'); ?>

</body>

</html>