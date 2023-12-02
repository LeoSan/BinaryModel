
window.formaFuncionesGlobales = async function (e){
    console.log(e)
    e.preventDefault();
    alert('Soy una prueba');
}

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
            "Content-Type": "application/json multipart/form-data",
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



window.metodoTeclado = (event)=>{
    console.log(event.target);
}



function validacion_teclado (e, permitidos, fieldObj, upperCase) {
    if (fieldObj.readOnly) return false;
    upperCase = typeof(upperCase) != 'undefined' ? upperCase : true;
    //e = e || event;

    charCode = e.keyCode; // || e.keyCode;

    if ((procesoRemesas.is_nonChar(charCode)) && e.shiftKey == 0)
        return true;
    else if (charCode == '')
        charCode = e.charCode;

    if (fieldObj.value.length == fieldObj.maxLength) return false;

    var caracter = String.fromCharCode(charCode);

    // Variables que definen los caracteres permitidos
    var numeros        = "0123456789";
    var float          = "0123456789.";
    var caracteres     = "  abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
    var car_especiales = ".-_()'\"/&";
    var anticipo       = numeros + caracteres;


    //Los valores de las llaves del array representan los posibles valores permitidos
    var selectArray = new Array();
    selectArray['all'] = '';
    selectArray['num'] = numeros;
    selectArray['float'] = float;
    selectArray['anticipo'] = anticipo;
    selectArray['nombre'] = caracteres;


    // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
    if ((selectArray[permitidos].indexOf(caracter) != -1) || (permitidos == 'all')) {
        return (true);
    }
    else {
        if (e.preventDefault)
            e.preventDefault();
        else
            e.returnValue = false;
    }
}


function is_nonChar(charCode) {

    // 8 = BackSpace, 9 = tabulador, 13 = enter, 35 = fin, 36 = inicio, 37 = flecha izquierda, 38 = flecha arriba,
    // 39 = flecha derecha, 37 = flecha izquierda, 40 = flecha abajo 46 = delete.

    var teclas_especiales = [8, 9, 13, 35, 36, 37, 38, 39, 40, 46];
    if ($.browser.msie) {
        return (false);
    }
    for (var i in teclas_especiales) {

        if (charCode == teclas_especiales[i]) {
            return (true);
        }
    }
}

