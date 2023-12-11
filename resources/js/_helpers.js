//funciones Helpers 

//funciones Globales
window.sendFetch = async  (datos, ruta)=>{
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let result = await fetch(ruta, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
            },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(res=> {
        return (res);
    });

    return result;
}

window.sendAxios = async (datos, ruta)=>{
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let config = {
        headers: {
            'Content-Type': 'multipart/form-data', 
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
            }      
    }

    let result = await axios.post(ruta, datos, config)
    //.then(res => res.json())
    .then(res=> {
        return (res);
    });

    return result;
}

window.validaStringTeclado = (event, tipo_validacion)=>{
    metodosValidacionPorTeclado(event, tipo_validacion);
}

window.pintaRespuesta = (resp)=>{

    if (resp.data.estatus == 201){
        document.getElementById('msgSuccess').classList.remove('d-none'); 
        document.getElementById('msgError').classList.add('d-none');
        document.getElementById('msgTextoSuccess').innerText= resp.data.message;

    }else{
        document.getElementById('msgError').classList.remove('d-none'); 
        document.getElementById('msgSuccess').classList.add('d-none');
        document.getElementById('msgTextoError').innerText= resp.data.message;
    }

}


//Funciones operacionales 
function metodosValidacionPorTeclado(event, tipo_validacion) {
    //Los valores de las llaves del array representan los posibles valores permitidos
    let selectArray = new Array();
    selectArray['all'] = '';
    selectArray['num'] = /[0-9]/;
    selectArray['float'] = /[0-9]+(\.[0-9]+)?/;
    selectArray['letras'] = /[a-zA-Z]/;
    let expresion = new RegExp(selectArray[tipo_validacion]);
    if (!expresion.test(event.value)) {
        event.value = "";
        return;
      }
}


