<section id="materias">
    <label for="cursos">Seleccionar las Materias</label>
    <hr>

    <div class="row">
        <?php
        include_once('../functions/settings.php');
        include_once("../../config/settingBD.php");
        include_once($base_path . "functions/funciones.php");

        $id_curso = $_REQUEST['id_curso'] ?? NULL;
        $id_profesor = $_REQUEST['id_profesor'] ?? NULL;

        // Obtener solo los ids de las materias asignadas al profesor para el curso seleccionado
        $idsMateriasProfe = getMateriasCursoProfesor($servidor, $id_profesor, $id_curso);
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
                            <input type="checkbox" name="materias[]" id="materia_<?= $materia['id_materia'] ?>" value="<?= $materia['id_materia'] ?>"
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