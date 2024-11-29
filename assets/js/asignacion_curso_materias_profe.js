const radios = document.getElementsByName("grados");
if (radios) {
  radios.forEach((radio) => {
    radio.addEventListener("change", () => procesarGradosSeleccionado(radios));
  });
}

async function procesarGradosSeleccionado(radios) {
  // Limpia el fondo de todos los elementos
  const listItems = document.querySelectorAll(
    "ul.list-group.list-group-flush li"
  );
  listItems.forEach((li) => {
    li.style.backgroundColor = "";
    li.style.borderRadius = "";
  });

  const radioSeleccionado = [...radios].find((radio) => radio.checked);
  const id_grado = radioSeleccionado ? radioSeleccionado.value : "";

  // Usa el valor de id_grado para encontrar el li correspondiente
  let li = document.querySelector(`#li_curso_${id_grado}`);
  if (li) {
    li.style.backgroundColor = "gainsboro";
    li.style.borderRadius = "5px";
  }

  try {
    let id_profesor = document.querySelector('input[name="id_profesor"]').value;
    let divResp = document.querySelector("#cuerpo_materias");
    let url = `get_materias_profesor.php?id_grado=${id_grado}&id_profesor=${id_profesor}`;
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
  const gradosSeleccionado = document.querySelector(
    'input[name="grados"]:checked'
  );
  if (!gradosSeleccionado) {
    alert("Por favor, selecciona al menos un curso.");
    return false;
  }

  const materiasSeleccionadas = document.querySelectorAll(
    'input[name="materias[]"]:checked'
  );
  const idMaterias = Array.from(materiasSeleccionadas).map(
    (checkbox) => checkbox.value
  );
  /*
  if (!idMaterias.length) {
    alert("Por favor, selecciona al menos una materia.");
    return false;
  }
  */
  console.log(gradosSeleccionado.value);
  console.log(materiasSeleccionadas.length);
  try {
    const response = await axios.post("recibe_asignacion.php", {
      idMaterias,
      id_grado: gradosSeleccionado.value,
      id_profesor: document.querySelector('input[name="id_profesor"]').value,
    });

    if (response.data.mensaje === "Ok") {
      console.log("¡La asignación se realizó con éxito!");
      document.querySelector(
        `#total_materias_${gradosSeleccionado.value}`
      ).innerHTML = materiasSeleccionadas.length;
    } else {
      alert("Error en la Asignacion.");
    }
  } catch (error) {
    console.error("Error al procesar la solicitud:", error);
  }
}
