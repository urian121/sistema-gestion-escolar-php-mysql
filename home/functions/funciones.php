  <?php
  include_once('../../config.php');
  
  function getMateriasCursoProfesor($servidor, $id_profesor, $id_curso)
  {
    $sql = "SELECT id_materia FROM tbl_profesores_materias WHERE id_profesor='$id_profesor' AND id_curso='$id_curso'";
    $result = $servidor->query($sql);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
      $materias[] = $row['id_materia'];  // Solo almacenamos el id_materia directamente
    }
    return $materias;
  }

  function getMateriasProfesor($servidor, $id_profesor)
  {
    $sql = "SELECT m.nombre_materia  FROM tbl_materias AS m
    INNER JOIN tbl_profesores_materias AS pm
    ON m.id_materia = pm.id_materia
     WHERE pm.id_profesor = '$id_profesor'";
    $result = $servidor->query($sql);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
      $materias[] = $row['nombre_materia'];
    }
    return $materias;
  }

  function getMateriasPorCursoProfesor($servidor, $id_profesor)
  {
    $sql = "SELECT 
        c.id_curso, 
        c.grado,
        c.jornada, 
        c.seccion,
        COUNT(m.id_materia) AS total_materias
    FROM tbl_cursos AS c
    LEFT JOIN tbl_profesores_materias AS pm 
    ON c.id_curso = pm.id_curso 
    AND pm.id_profesor = '$id_profesor'
    LEFT JOIN tbl_materias AS m ON m.id_materia = pm.id_materia
    GROUP BY c.id_curso";
    $result = $servidor->query($sql);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
      $materias[] = $row;
    }
    return $materias;
  }

  function getCursosProfesor($servidor, $id_profesor)
  {
    $sql = "SELECT 
      c.id_curso, c.grado,
      c.jornada, c.seccion FROM tbl_cursos AS c
    INNER JOIN tbl_profesores_materias AS pm 
    ON c.id_curso = pm.id_curso 
    WHERE id_profesor = '$id_profesor'";
    $result = $servidor->query($sql);
    $cursos = [];
    while ($row = $result->fetch_assoc()) {
      $cursos[] = $row;
    }
    return $cursos;
  }

  function getMaterias($servidor)
  {
    $sql = "SELECT * FROM tbl_materias";
    $result = $servidor->query($sql);
    $materias = []; // Inicializar el array vacío
    while ($row = $result->fetch_assoc()) {
      $materias[] = $row;
    }
    return $materias;
  }

  function  getMateria($servidor, $id_materia)
  {
    $sql = "SELECT * FROM tbl_materias WHERE id_materia = '$id_materia'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
  }

  function getCursos($servidor)
  {
    $sql = "SELECT * FROM tbl_cursos";
    $result = $servidor->query($sql);
    $cursos = []; // Inicializar el array vacío
    while ($row = $result->fetch_assoc()) {
      $cursos[] = $row;
    }
    return $cursos;
  }

  function getEstudiantes($servidor)
  {
    $sql = "SELECT tbl_a.*, tbl_c.* 
      FROM tbl_estudiantes AS tbl_a
      INNER JOIN tbl_cursos AS tbl_c 
      ON tbl_a.id_curso = tbl_c.id_curso";
    $result = $servidor->query($sql);
    $estudiantes = []; // Inicializar el array vacío
    while ($row = $result->fetch_assoc()) {
      $estudiantes[] = $row;
    }
    return $estudiantes;
  }

  function getEstudiante($servidor, $id_estudiante)
  {
    $sql = "SELECT * FROM tbl_estudiantes WHERE id_estudiante = '$id_estudiante'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
  }
  function getCurso($servidor, $id_curso)
  {
    $sql = "SELECT * FROM tbl_cursos WHERE id_curso = '$id_curso'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
  }

  function getProfesores($servidor)
  {
    $sql =
      "SELECT 
        p.id_profesor AS profesor_id, 
        p.nombre AS profesor_nombre,
        p.apellido,
        p.identificacion,
        p.especialidad,
        p.avatar_profesor
      FROM tbl_profesores AS p";
    $result = $servidor->query($sql);
    $profesores = [];
    while ($row = $result->fetch_assoc()) {
      $profesores[] = $row;
    }
    return $profesores;
  }


  function getProfesor($servidor, $profesor)
  {
    $sql = "SELECT * FROM tbl_profesores WHERE id_profesor = '$profesor'";
    $result = $servidor->query($sql);
    $row = $result->fetch_assoc();
    return $row;
  }

  function btn_volver()
  {
    echo '<button type="button" class="btn btn-inverse-dark mb-5" onclick="window.history.back();"> <i class="fa fa-mail-reply"></i> Volver</button>';
  }

  function btn_cancelar()
  {
    echo '<button type="button" class="btn btn-secondary" onclick="window.location.href=\'' . BASE_HOME . '\'">
              Cancelar
              <i class="fa fa-times ms-2" style="color: #4d4a4a;"></i>
          </button>';
  }
  ?>