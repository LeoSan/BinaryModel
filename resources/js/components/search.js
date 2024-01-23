const ruta = 'http://binarymodel.test/result-search';
var obj = {};
obj['tipo'] = 'vista';

//Metodos Dinamicos del Buscador y Filtros

let btnLimpiarFiltros = document.getElementById("btnLimpiarFiltros");

if (btnLimpiarFiltros){
    btnLimpiarFiltros.addEventListener("click",function(e){
        //e.preventDefault();
        let form_filter = document.getElementById("form_filter");
        form_filter.reset();
    });
}

//Metodo del Filtrado 

//Magia negra 
 const form_filter = document.getElementById("form_filter");
 escucharSelects(form_filter);
 //escucharCheckbox(form_filter)

  function escucharSelects(form) {
    const selects = form.querySelectorAll("select");
    selects.forEach((select) => {
      select.addEventListener("change", async(e) => {
        //Declaro Variables 
        let skills_arrays = [];
        //Audiencia 
        obj['edad'] = getValue('edad', "select");
        obj['nacionalidad'] = getValue('nacionalidad', "select");
        obj['genero'] = getValue('genero', "select");
        obj['likes'] = getValue('likes', "select");
        obj['views'] = getValue('views', "select");

        //Rasgos Fisicos 
        obj['altura'] = getValue('altura', "select");
        obj['busto'] = getValue('busto', "select");
        obj['cintura'] = getValue('cintura', "select");
        obj['cadera'] = getValue('cadera', "select");
        obj['calzado'] = getValue('calzado', "select");
        obj['color_ojos'] = getValue('color_ojos', "select");
        obj['color_cabello'] = getValue('color_cabello', "select");

        // Habilidades 
        const checkboxs = form.querySelectorAll(".form-check-input");
        checkboxs.forEach((element) => {
             if (element.checked == true){
                skills_arrays.push( element.value );
             }
        });
        obj['habilidades'] = skills_arrays;
        console.log(obj);
        const result = await sendAxios(obj, ruta); 
      });//Fin del Bucle de select 
           
    });

  }


function escucharCheckbox(form) {
    const checkboxs = form.querySelectorAll("checkbox");
    checkboxs.forEach((checkbox) => {
        checkbox.addEventListener("change", (e) => {
        //Select Audiencia 
        let edad = getValue('edad', "select");
        let nacionalidad = getValue('nacionalidad', "select");
        let genero = getValue('genero', "select");
        let likes = getValue('likes', "select");
        let views= getValue('views', "select");

        // Rasgos Fisicos 
        let altura= getValue('altura', "select");
        let busto= getValue('busto', "select");
        let cintura= getValue('cintura', "select");
        let cadera= getValue('cadera', "select");
        let calzado= getValue('calzado', "select");
        let color_ojos= getValue('color_ojos', "select");
        let color_cabello= getValue('color_cabello', "select");

        // Habilidades 
        let check_skill_1 = getValue('check_skill_1', "check");

      });
    });
  }

const getValue = (identificador, tipo)=>{
    const element = document.getElementById(identificador);
    //console.log(identificador);
    if (tipo == "check"){
        if (element.checked){
            return element.value
        }
    }else{
        //console.log(element.value);
        if (element.value > 0)
            return element.value
        else
            return 0 
    }
    
}

