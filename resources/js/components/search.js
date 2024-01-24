//Declaración de Variables y Componentes 
import packageJson from "/package.json";
const ruta =  `${packageJson.config.api}${packageJson.config.search}`;
var obj    = {};
let btnLimpiarFiltros = document.getElementById("btnLimpiarFiltros");
const form_filter = document.getElementById("form_filter");

//Metodos Dinamicos del Buscador y Filtros

if (btnLimpiarFiltros) {
  btnLimpiarFiltros.addEventListener("click", function (e) {
    //e.preventDefault();
    let form_filter = document.getElementById("form_filter");
    document.getElementById('badgesEncontrados').innerHTML = `0 Perfiles encontrados`;
    form_filter.reset();
  });
}

if (form_filter) {
  escucharElementosDinamicos(form_filter, "select", "change");
  escucharElementosDinamicos(form_filter, ".checkbox_skill", "click")
}

//Declaración de funciones 
function escucharElementosDinamicos(form, elemento, tipo_evento) {
  const selects = form.querySelectorAll(elemento);
  selects.forEach((select) => {
    select.addEventListener(tipo_evento, async (e) => {
      //Declaro Variables 
      let skills_arrays = [];
      obj['tipo'] = 'contador';
      //Audiencia 
      obj['edad'] = getValue('edad', elemento);
      obj['nacionalidad'] = getValue('nacionalidad', elemento);
      obj['genero'] = getValue('genero', elemento);
      obj['likes'] = getValue('likes', elemento);
      obj['views'] = getValue('views', elemento);
      //Rasgos Fisicos 
      obj['altura'] = getValue('altura', elemento);
      obj['busto'] = getValue('busto', elemento);
      obj['cintura'] = getValue('cintura', elemento);
      obj['cadera'] = getValue('cadera', elemento);
      obj['calzado'] = getValue('calzado', elemento);
      obj['color_ojos'] = getValue('color_ojos', elemento);
      obj['color_cabello'] = getValue('color_cabello', elemento);
      // Habilidades 
      const checkboxs = form.querySelectorAll(".checkbox_skill");
      checkboxs.forEach((element) => {
        if (element.checked == true) {
          skills_arrays.push(element.value);
        }
      });
      obj['habilidades'] = skills_arrays;
      //console.log(obj['habilidades']);
      //Conectar 
      const result = await sendAxios(obj, ruta);

      //Resultado
      if (result.status == 201)
        document.getElementById('badgesEncontrados').innerHTML = `${result.data.count} Perfiles encontrados`;
      else
        document.getElementById('badgesEncontrados').innerHTML = `${result.data.message}`;

    });//Fin del Bucle de select 

  });

}
const getValue = (identificador, tipo) => {
  const element = document.getElementById(identificador);
  //console.log(identificador);
  if (tipo == "check") {
    if (element.checked) {
      return element.value
    }
  } else {
    //console.log(element.value);
    if (element.value > 0)
      return element.value
    else
      return 0
  }
}

