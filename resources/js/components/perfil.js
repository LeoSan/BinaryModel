//Instancias 
const form1 = document.getElementById('form_perfil_fisico');
const inpAltuta = document.getElementById('inpAltuta');
const inpBusto = document.getElementById('inpBusto');
const inpCintura = document.getElementById('inpCintura');
const inpCadera = document.getElementById('inpCadera');
const inpCalzado = document.getElementById('inpCalzado');
const inpColorOjos = document.getElementById('inpColorOjos');
const inpColorCabello = document.getElementById('inpColorCabello');
const inpNombre = document.getElementById('inpNombre');


//Procesos 

if (form1){

    form1.addEventListener("submit", async function(e){
        e.preventDefault();
        //Obtengo valor del formulario 
        var obj = {};
        var formData1 = new FormData(form1);
    
        //Genero Matriz para los datos de cada formulario
        for (var key of formData1.keys()) {
            obj[key] = formData1.get(key);
        }

        //animaciones 
        document.getElementById('form1_loading').classList.remove('d-none'); // Get element from DOM
        document.getElementById('form_fisico').style.display = "none";   
        document.getElementById('btnFisico').disabled = true;

        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        const result = await sendAxios(obj, ruta);
        //Animaciones

        setTimeout(() => {
            document.getElementById('form1_loading').classList.add('d-none') // Get element from DOM
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
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpAltuta'] = inpAltuta.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpBusto){
    inpBusto.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpBusto'] = inpBusto.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpCintura){
    inpCintura.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpCintura'] = inpCintura.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpCadera){
    inpCadera.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpCadera'] = inpCadera.value;
        const result = await sendAxios(obj, ruta);
    });
}

if(inpCalzado){
    inpCalzado.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpCalzado'] = inpCalzado.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpColorOjos){
    inpColorOjos.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpColorOjos'] = inpColorOjos.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpColorCabello){
    inpColorCabello.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'vista';
        obj['inpColorCabello'] = inpColorCabello.value;
        const result = await sendAxios(obj, ruta);
    });
}
if(inpNombre){
    inpNombre.addEventListener("focusout", async(event) => {
        event.preventDefault();
        //Envio 
        const ruta = 'http://binarymodel.test/perfil/registrar';
        //Genero Matriz para los datos de cada formulario
        var obj = {};
        obj['tipo'] = 'usuario';
        obj['inpNombre'] = inpNombre.value;
        const result = await sendAxios(obj, ruta);
    });
}



