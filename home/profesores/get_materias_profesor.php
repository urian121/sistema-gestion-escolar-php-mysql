    <h4 class="fw-bold">
        Seleccionar las Materias
        <button style="float: right !important; margin-top: -15px;" type="submit" class="btn btn-primary" onclick="window.procesarAsignacion(event)">
            Asignar Grado y Materias &nbsp; <i class="fa fa-mail-forward"></i>
        </button>
    </h4>
    <hr>

    <div class="row">
        <?php
        include_once '../../settings/config.php';
        include(BASE_PATH_COMPONENTS . '/loader.html');
        include_once(SETTINGS_BD);
        include_once(COMPONENTES_GLOBALES);
        include_once(BASE_CONTROLLER_PROFESORES);
        include_once(BASE_CONTROLLER_MATERIAS);

        $id_grado = $_REQUEST['id_grado'] ?? NULL;
        $id_profesor = $_REQUEST['id_profesor'] ?? NULL;

        // Obtener solo los ids de las materias asignadas al profesor para el curso seleccionado
        $idsMateriasProfe = getMateriasCursoProfesor($servidor, $id_profesor, $id_grado);
        $materias = getMaterias($servidor);

        $counter = 0;
        foreach ($materias as $materia) :
            // Crear un nuevo contenedor cada 3 materias
            if ($counter % 3 === 0) : ?>
                <div class="col-md-4">
                    <ul class="list-group list-group-flush">
                    <?php endif; ?>

                    <li class="list-group-item">
                        <label for="materia_<?= $materia['id_materia'] ?>" style="cursor: pointer; font-size: 18px;">
                            <input class="custom_checkbox" type="checkbox" name="materias[]" id="materia_<?= $materia['id_materia'] ?>" value="<?= $materia['id_materia'] ?>"
                                <?php if (in_array($materia['id_materia'], $idsMateriasProfe)) echo 'checked'; ?>>
                            <?= $materia['nombre_materia'] ?>
                        </label>
                    </li>

                    <?php
                    $counter++;
                    // Cerrar el contenedor después de cada 3 materias
                    if ($counter % 3 === 0) : ?>
                    </ul>
                </div>
            <?php endif;
                endforeach;

                // Cerrar el último contenedor si no se completó con 3 materias
                if ($counter % 3 !== 0) : ?>
            </ul>
    </div>
    <?php endif; ?>
    </section>