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

    $edit = false;
    if (isset($_GET['edit_profe']) || !empty($_GET['edit_profe'])) {
        $edit = true;
        $profeDetalles = $edit ? getProfesor($servidor, $_GET['edit_profe']) : [];
    }

    if (isset($_GET['add_profe']) && !empty($_GET['add_profe'])) {
        $id_profesor = $_GET['add_profe'];
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
                                        <div class="col-md-6">
                                            <?php echo btn_volver(); ?>

                                            <h2 class="mb-3 text-center">
                                                <?= $edit ? 'Editar Datos del Profesor' : 'Registrar Nuevo Profesor' ?>
                                                <hr>
                                            </h2>

                                            <form method="POST" method="POST" action="<?= POST_FORM_PROFESOR; ?>" autocomplete="off" enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="<?= $edit ? 'editProfesor' : 'addProfesor' ?>">
                                                <?php
                                                if ($edit): ?>
                                                    <input type="hidden" name="id_profesor" value="<?= $_GET['edit_profe']; ?>">
                                                <?php endif; ?>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Nombre del Profesor">Nombre del Profesor</label>
                                                            <input type="text" name="nombre" value="<?= $edit ? $profeDetalles['nombre'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Apellido del Profesor">Apellido del Profesor</label>
                                                            <input type="text" name="apellido" value="<?= $edit ? $profeDetalles['apellido'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Identificación del Profesor">Identificación del Profesor</label>
                                                            <input type="text" name="identificacion" value="<?= $edit ? $profeDetalles['identificacion'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Especialidad del Profesor">Especialidad del Profesor</label>
                                                            <input type="text" name="especialidad" value="<?= $edit ? $profeDetalles['especialidad'] : '' ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-6">
                                                    <div class="col-md-5">
                                                        <div class="file-input">
                                                            <label for="avatar_profesor" class="mb-2">Imagen de Perfil</label>
                                                            <br>
                                                            <input type="file" name="avatar_profesor" id="file-input-avatar" class="file-input__input" accept=".png, .jpg, .jpeg" />
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
                                                                $avatar = empty($profeDetalles['avatar_profesor'])
                                                                    ?  BASE_STATIC . 'assets/images/sin-avatar.png'
                                                                    : BASE_STATIC . 'assets/avatar_profesores/' . $profeDetalles['avatar_profesor'];
                                                                ?>
                                                                <img src="<?= $avatar; ?>" alt="<?= $profeDetalles['nombre']; ?>" style="max-width: 50px;">
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="d-grid gap-2 d-md-flex justify-content-center mt-5">
                                                    <button type="submit" class="btn btn-primary ">
                                                        <?= $edit ? 'Guardar Nuevos Cambios' : 'Crear Nuevo Profesor' ?>
                                                        &nbsp; <i class="fa fa-rotate-right ms-2"></i>
                                                    </button>
                                                    <?php echo btn_cancelar(BASE_HOME); ?>
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
        </div>
    </div>


    <?php include(BASE_PATH_COMPONENTS . '/footer.php'); ?>

</body>

</html>