
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