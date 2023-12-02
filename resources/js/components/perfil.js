//Instancias 
const ruta = 'http://binarymodel.test/perfil/registrar';

const form1 = document.getElementById('form_perfil_fisico');
const inpAltuta = document.getElementById('inpAltuta');
const inpBusto = document.getElementById('inpBusto');
const inpCintura = document.getElementById('inpCintura');
const inpCadera = document.getElementById('inpCadera');
const inpCalzado = document.getElementById('inpCalzado');
const inpColorOjos = document.getElementById('inpColorOjos');
const inpColorCabello = document.getElementById('inpColorCabello');
const inpNombre = document.getElementById('inpNombre');
const inpBiografia = document.getElementById('inpBiografia');
const checkPublicar = document.getElementById('checkPublicar');

//Procesos 

if (form1){

    form1.addEventListener("submit", async function(e){
        e.preventDefault();
        //Obtengo valor del formulario 
        var obj = {};
        var formData1 = new FormData(form1);
    
        
        for (var key of formData1.keys()) {
            obj[key] = formData1.get(key);
        }

        //animaciones 
        document.getElementById('form1_loading').classList.remove('d-none'); 
        document.getElementById('msgSuccess').classList.add('d-none')
        document.getElementById('msgError').classList.add('d-none')
        document.getElementById('form_fisico').style.display = "none";   
        document.getElementById('btnFisico').disabled = true;
        

        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        const result = await sendAxios(obj, ruta);
        //Animaciones

        await setTimeout(() => {
            document.getElementById('form1_loading').classList.add('d-none') 
            document.getElementById('form_fisico').style.display = "block";   
            document.getElementById('btnFisico').removeAttribute('disabled');
        }, 2000);

        //Valido Resultados 
        if (result.status == 201){
            document.getElementById('msgSuccess').classList.remove('d-none');
            document.getElementById('msgTextoSuccess').innerText= result.data.message;
        }else{
            //Generar componente para mensaje de error
            document.getElementById('msgError').classList.remove('d-none');
            document.getElementById('msgTextoError').innerText= result.data.message;

        }
    });
} 

//Proceso individual 
if(inpAltuta){
    inpAltuta.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
       
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpAltuta'] = inpAltuta.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpBusto){
    inpBusto.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpBusto'] = inpBusto.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpCintura){
    inpCintura.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpCintura'] = inpCintura.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpCadera){
    inpCadera.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpCadera'] = inpCadera.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpCalzado){
    inpCalzado.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpCalzado'] = inpCalzado.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpColorOjos){
    inpColorOjos.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpColorOjos'] = inpColorOjos.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpColorCabello){
    inpColorCabello.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpColorCabello'] = inpColorCabello.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpNombre){
    inpNombre.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'usuario';
        obj['inpNombre'] = inpNombre.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpBiografia){
    inpBiografia.addEventListener("focusout", async(event) => {
        event.preventDefault();
        
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpBiografia'] = inpBiografia.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(checkPublicar){
    checkPublicar.addEventListener("click", async(event) => {
        var obj = {};
        obj['tipo'] = 'vista';
        obj['checkPublicar'] = (event.target.checked)?1:0;
        const result = await sendAxios(obj, ruta);
    });
}


//Proceso dinámico para el catálogo 
document.querySelectorAll(".check_marca").forEach( async(el) => {

    el.addEventListener("click", async(e) => {
        const id = e.target.getAttribute("data-id");
        const padre = e.target.getAttribute("data-padre");
        const perfil_id = e.target.getAttribute("data-perfil");

        var obj = {};
        obj['tipo'] = 'marca';
        obj['id'] = id;
        obj['padre'] = padre;
        obj['perfil_id'] = perfil_id;
        obj['checked'] = e.target.checked;

        const result = await sendAxios(obj, ruta);
    });
  
});

document.querySelectorAll(".inputRedes").forEach( async(el) => {

    el.addEventListener("focusout", async(e) => {
        const nombre = e.target.getAttribute("data-nombre");
        const perfil_id = e.target.getAttribute("data-perfil");

        var obj = {};
        obj['tipo']      = 'social';
        obj['nombre']    = nombre;
        obj['perfil_id'] = perfil_id;
        obj['value']     = (e.target.value.length > 0)?e.target.value:'null';
        obj['activo']    = (e.target.value.length > 0)?true:false;

        const result     = await sendAxios(obj, ruta);
    });
  
});



