//Metodos Dinamicos del Buscador y Filtros

let btnLimpiarFiltros = document.getElementById("btnLimpiarFiltros");

if (btnLimpiarFiltros){
    btnLimpiarFiltros.addEventListener("click",function(e){
        //e.preventDefault();
        let form_filter = document.getElementById("form_filter");
        form_filter.reset();
    });
}