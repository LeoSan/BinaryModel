const form1 = document.getElementById('form_perfil_fisico');
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




