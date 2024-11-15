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
    include_once(BASE_CONTROLLER_GRADOS);

    $edit = isset($_GET['id_estudiante']);
    $estudianteDetalles = $edit ? getEstudiante($servidor, $_GET['id_estudiante']) : [];
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
                                        <div class="col-md-6">
                                            <?php echo btn_volver(); ?>
                                            <h2 class="mb-3 text-center">
                                                Registrar Nuevo Estudiante
                                                <hr>
                                            </h2>

                                            <form method="POST" action="<?= POST_FORM_ESTUDIANTE; ?>" autocomplete="off" enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="<?= $edit ? 'editEstudiante' : 'addEstudiante' ?>">
                                                <input type="hidden" name="id_estudiante" value="<?= $edit ? $estudianteDetalles['id_estudiante'] : '' ?>">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Nombre del Estudiante">Nombre</label>
                                                            <input type="text" name="nombre_estudiante" value="<?= $edit ? $estudianteDetalles['nombre_estudiante'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Apellido del Estudiante">Apellido</label>
                                                            <input type="text" name="apellido_estudiante" value="<?= $edit ? $estudianteDetalles['apellido_estudiante'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="Email del Estudiante">Email</label>
                                                            <input type="email" name="email_estudiante" value="<?= $edit ? $estudianteDetalles['email_estudiante'] : '' ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Fecha de Nacimiento">Fecha de Nacimiento</label>
                                                            <input type="date" name="fecha_nacimiento" value="<?= $edit ? $estudianteDetalles['fecha_nacimiento'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="Dirección del Estudiante">Dirección</label>
                                                            <input type="text" name="direccion_estudiante" value="<?= $edit ? $estudianteDetalles['direccion_estudiante'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Curso">Curso</label>
                                                            <select name="id_grado" class="form-select">
                                                                <?php
                                                                $grados = getGrados($servidor);
                                                                foreach ($grados as $curso) : ?>
                                                                    <option value="<?= $curso['id_grado']; ?>" <?= $edit && $estudianteDetalles['id_grado'] == $curso['id_grado'] ? 'selected' : '' ?>>
                                                                        <?= $curso['grado'] . ' ' . $curso['jornada'] . ' ' . $curso['seccion'] ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-5">
                                                    <div class="col-md-6">
                                                        <div class="file-input">
                                                            <label for="perfil_estudiante" class="mb-2">Imagen de Perfil</label>
                                                            <br>
                                                            <input type="file" name="perfil_estudiante" id="file-input-avatar" class="file-input__input" accept=".png, .jpg, .jpeg" />
                                                            <label class="file-input__label" for="file-input-avatar">
                                                                <i class="fa fa-cloud-upload"></i> &nbsp;
                                                                <span>Subir Imagen</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($edit) { ?>
                                                        <div class="col-md-6">
                                                            <label>Imagen actual<br>
                                                                <?php
                                                                $avatar = empty($estudianteDetalles['perfil_estudiante'])
                                                                    ? BASE_STATIC . 'assets/images/sin-avatar.png'
                                                                    : BASE_STATIC . 'assets/avatar_estudiantes/' . $estudianteDetalles['perfil_estudiante'];
                                                                ?>
                                                                <img src="<?= $avatar; ?>" alt="<?= $estudianteDetalles['perfil_estudiante']; ?>" style="max-width: 100px;">
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary me-2">
                                                        <?= $edit ? 'Guardar Cambios' : 'Crear Nuevo Estudiante' ?>
                                                        &nbsp; <i class="fa fa-rotate-right ms-2"></i>
                                                    </button>
                                                    <?php echo btn_cancelar(BASE_HOME); ?>
                                                </div>
                                            </form>
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