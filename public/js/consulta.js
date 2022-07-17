
function refrescarTabla(){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        requestTabla = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE
        requestTabla = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    //requestTabla.overrideMimeType('text/xml');
    
    //definir funcion de respuesta del servidor
    requestTabla.onreadystatechange = function(){
        // procesar la respuesta
        if (requestTabla.status == 200) {
            document.getElementById("div_contenedorTabla").innerHTML = requestTabla.responseText;
            activarBotonesEditar();
            // perfect!
        } else {
            // hubo algún problema con la petición,
            // por ejemplo código de respuesta 404 (Archivo no encontrado)
            // o 500 (Internal Server Error)
            document.getElementById("div_contenedorTabla").innerHTML = "Algo salio mal en consulta tabla!";
        }                        
        
    };
    
    requestTabla.open('POST', 'http://localhost:800/src/controller/ControladorConsulta.php', true);
    requestTabla.send();
}

refrescarTabla();
