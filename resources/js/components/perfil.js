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
const form_upload = document.getElementById('form_upload');
const form_upload_gallery = document.getElementById('form_upload_gallery');

//Eventos 
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
        obj['tipo'] = 'vista';
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
if (form_upload_gallery){
    form_upload_gallery.addEventListener("submit",async function(e){
        e.preventDefault();
        let F3 = document.getElementById("form_upload_gallery");
        let formData3 = new FormData(F3);
        const fileInput = document.getElementById('documento_archivo_gallery');
        formData3.append('documento_archivo_gallery', fileInput.files[0]);//la clave esta aqui de los files[0]
        formData3.append('accept_gallery', document.getElementById('accept_file').value);
        formData3.append('tipo', 'gallery');
        formData3.append('tipo_imagen', 'gallery_work');
        formData3.append('name', document.getElementById('name').value);
        formData3.append('description', document.getElementById('description').value);
        const result = await sendAxios(formData3, ruta);      
        console.log(result.data.filas);
        //        pintaRespuesta(result);

          pintaListadoGalleria(result.data.filas);
        
    });
}
if (form_upload){
    form_upload.addEventListener("submit",async function(e){
        e.preventDefault();
        let F3 = document.getElementById("form_upload");
        let formData3 = new FormData(F3);
        const fileInput = document.getElementById('documento_archivo_file');
        formData3.append('documento_archivo_file', fileInput.files[0]);//la clave esta aqui de los files[0]
        formData3.append('accept_file', document.getElementById('accept_file').value);
        formData3.append('tipo', 'file');
        formData3.append('tipo_imagen', 'hero');
        const result = await sendAxios(formData3, ruta);      
        pintaRespuesta(result);
        
        if(result.data.estatus == 201){
            let ruta_js = result.data.ruta.split("public");
            const imagen = document.getElementById('img_hero');
            ruta_js = '/storage' + ruta_js[1];
            imagen.setAttribute('src', ruta_js);
        }
    });
}

//funciones dinámicas 
document.querySelectorAll(".check_marca").forEach( async(el) => {

    el.addEventListener("click", async(e) => {
        const id = e.target.getAttribute("data-id");
        const padre = e.target.getAttribute("data-padre");
        const user = e.target.getAttribute("data-user");

        var obj = {};
        obj['tipo']    = 'marca';
        obj['id']      = id;
        obj['padre']   = padre;
        obj['user']    = user;
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
        obj['value']     = (e.target.value.length > 0)?e.target.value:'Sin asignar';
        obj['activo']    = (e.target.value.length > 0)?true:false;

        const result     = await sendAxios(obj, ruta);
    });
  
});


const pintaListadoGalleria = (filas)=>{

    let registros = '';
    let contenedor = document.getElementById('registrosGalleria');
    
    filas.forEach( (element, index) => {
        registros +=`<tr id="frow_${element.id}">`;
        registros +=`<th scope="row">${index}</th>`; 
        registros +=`<td>${element.nombre_anexo}</td>`;
        registros +=`<td>${element.descripcion}</td>`;
        registros +=`<td> <a id="btnFotoeliminar_${element.id}" href="#" onclick="eliminaFotoGalleria(this)" data-id="${element.id}"> 
                            <svg width="15" height="21" viewBox="0 0 15 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                    <path d="M12.962 2.996h-1.248a.322.322 0 0 1-.322-.322V2.11c0-.888-.722-1.61-1.61-1.61H4.79c-.888 0-1.61.722-1.61 1.61v.564a.322.322 0 0 1-.322.322H1.61c-.889 0-1.61.72-1.61 1.61v1.53c0 .178.144.322.322.322H14.25a.322.322 0 0 0 .322-.322v-1.53c0-.89-.72-1.61-1.61-1.61zm-2.858-.322a.322.322 0 0 1-.322.322H4.79a.322.322 0 0 1-.322-.322V2.11c0-.178.145-.322.322-.322h4.992c.178 0 .322.144.322.322v.564zm2.778 4.589H1.692a.322.322 0 0 0-.323.322V17.89c0 .89.721 1.61 1.61 1.61h8.615c.89 0 1.61-.72 1.61-1.61V7.585a.322.322 0 0 0-.322-.322zM4.67 17.246a.644.644 0 0 1-1.288 0v-7.97a.644.644 0 0 1 1.288 0v7.97zm3.26 0a.644.644 0 0 1-1.288 0v-7.97a.644.644 0 0 1 1.288 0v7.97zm3.26 0a.644.644 0 0 1-1.287 0v-7.97a.644.644 0 0 1 1.288 0v7.97z" id="a"/>
                                </defs>
                                <use fill="#D0021B" xlink:href="#a" transform="translate(0 .5)" fill-rule="evenodd"/>
                            </svg></a>
                    </td>`;
        registros +=`</tr>`; 
    }); 

    contenedor.innerHTML = registros;

}

//funciones globales 
window.eliminaFotoGalleria = async(event)=>{
    //console.log(event.dataset.id);
    var obj = {};
    obj['tipo'] = 'foto_eliminar';
    obj['id'] = event.dataset.id;
    const result = await sendAxios(obj, ruta);
    pintaRespuesta(result);
    if (result.data.estatus == 201){
        document.getElementById(`frow_${event.dataset.id}`).remove();
    }
}


