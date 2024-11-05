const radios = document.getElementsByName("cursos");
if (radios) {
  radios.forEach((radio) => {
    radio.addEventListener("change", () => procesarCursoSeleccionado(radios));
  });
}

async function procesarCursoSeleccionado(radios) {
  // Limpia el fondo de todos los elementos
  const listItems = document.querySelectorAll(
    "ul.list-group.list-group-flush li"
  );
  listItems.forEach((li) => {
    li.style.backgroundColor = "";
    li.style.borderRadius = "";
  });

  const radioSeleccionado = [...radios].find((radio) => radio.checked);
  const id_curso = radioSeleccionado ? radioSeleccionado.value : "";

  // Usa el valor de id_curso para encontrar el li correspondiente
  let li = document.querySelector(`#li_curso_${id_curso}`);
  if (li) {
    li.style.backgroundColor = "gainsboro";
    li.style.borderRadius = "5px";
  }

  try {
    let id_profesor = document.querySelector('input[name="id_profesor"]').value;
    let divResp = document.querySelector("#cuerpo_materias");
    let url = `get_materias_profesor.php?id_curso=${id_curso}&id_profesor=${id_profesor}`;
    if (url) {
      $(divResp).load(url, function () {
        console.log("Se han cargado las materias del profesor.");
      });
    }
  } catch (error) {
    console.error("Error al procesar la solicitud:", error);
  }
}

async function procesarAsignacion(event) {
  event.preventDefault();

  // Selecciona el radio button marcado
  const cursoSeleccionado = document.querySelector(
    'input[name="cursos"]:checked'
  );
  if (!cursoSeleccionado) {
    alert("Por favor, selecciona al menos un curso.");
    return false;
  }

  const materiasSeleccionadas = document.querySelectorAll(
    'input[name="materias[]"]:checked'
  );
  const idMaterias = Array.from(materiasSeleccionadas).map(
    (checkbox) => checkbox.value
  );
  if (!idMaterias.length) {
    alert("Por favor, selecciona al menos una materia.");
    return false;
  }

  try {
    const response = await axios.post("recibe_asignacion.php", {
      idMaterias,
      id_curso: cursoSeleccionado.value,
      id_profesor: document.querySelector('input[name="id_profesor"]').value,
    });

    console.log(response.data);
    if (response.data.mensaje === "Correcto") {
      alert("Asignacion Correcta");
      window.location.href = window.location.href;
    } else {
      alert("Error en la Asignacion.");
    }
  } catch (error) {
    console.error("Error al procesar la solicitud:", error);
  }
}
