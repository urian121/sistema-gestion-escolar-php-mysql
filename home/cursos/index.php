<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include_once('../../config.php');
    include_once(BASE_PATH_COMPONENTS . '/head.php');
    ?>
</head>

<body>
    <?php
    include(BASE_PATH_COMPONENTS . '/loader.html');
    include_once(SETTINGS_BD);
    include_once(BASE_PATH . "/home/functions/funciones.php");

    $cursos = getCursos($servidor);
    $edit = isset($_GET['id_curso']);
    $cursoDetalles = $edit ? getCurso($servidor, $_GET['id_curso']) : [];
    ?>

    <div class="container-scroller">
        <?php include_once(BASE_PATH_COMPONENTS . '/sidebar.php'); ?>
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
                                                echo btn_volver('./');
                                            endif; ?>

                                            <h4 class="card-title mt-3 mb-5">
                                                <?= $edit ? 'Editar' : 'Registrar Nuevo Grado' ?>
                                                <hr>
                                            </h4>

                                            <form class="forms-sample" method="POST" action="<?= BASE_STATIC ?>functions/actionsBD.php" autocomplete="off">
                                                <input type="hidden" name="action" value="<?= $edit ? 'editCurso' : 'addCurso' ?>">
                                                <input type="hidden" name="id_curso" value="<?= $edit ? $cursoDetalles['id_curso'] : '' ?>">
                                                <div class="form-group">
                                                    <label for="Grado del Curso">Grado</label>
                                                    <input type="text" name="grado" value="<?= $edit ? $cursoDetalles['grado'] : '' ?>" required class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jornada">Jornada</label>
                                                    <select name="jornada" class="form-select">
                                                        <option value="">Seleccione una Jornada</option>
                                                        <option value="Mañana" <?= $edit && $cursoDetalles['jornada'] == 'Mañana' ? 'selected' : '' ?>>Mañana</option>
                                                        <option value="Tarde" <?= $edit && $cursoDetalles['jornada'] == 'Tarde' ? 'selected' : '' ?>>Tarde</option>
                                                        <option value="Nocturna" <?= $edit && $cursoDetalles['jornada'] == 'Nocturna' ? 'selected' : '' ?>>Nocturna</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="seccion">Sección</label>
                                                    <input type="text" name="seccion" value="<?= $edit ? $cursoDetalles['seccion'] : '' ?>" required class="form-control">
                                                </div>

                                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary me-2"> <?= $edit ? 'Guardar Cambios' : 'Crear Nuevo Grado' ?></button>
                                                    <?php echo btn_cancelar(BASE_STATIC); ?>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Columna de lista de Grados -->
                                        <div class="col-md-8">
                                            <h2 class="text-center">Lista de Grados Total (<?= count($cursos); ?>)</h2>
                                            <hr>
                                            <div class="table-responsive">
                                                <table id="tbl_cursos" class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Grado</th>
                                                            <th>Jornada</th>
                                                            <th>Sección</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($cursos as $curso): ?>
                                                            <tr <?= $edit && $curso['id_curso'] == $cursoDetalles['id_curso'] ? 'style="background-color: #c2c2c2;"' : '' ?>>
                                                                <td width="5%" class="text-center"><?= $curso['id_curso']; ?></td>
                                                                <td><?= $curso['grado']; ?></td>
                                                                <td><?= $curso['jornada']; ?></td>
                                                                <td><?= $curso['seccion']; ?></td>
                                                                <td width="10%" class="text-center">
                                                                    <a class="btn btn-inverse-primary btn-sm" href=" ./?id_curso=<?= $curso['id_curso'] ?>" class="button small" aria-label="Editar Curso <?= $curso['grado'] ?>">
                                                                        <i class="fa fa-edit"></i> Editar
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> <!-- Fin de la fila para las dos columnas -->
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