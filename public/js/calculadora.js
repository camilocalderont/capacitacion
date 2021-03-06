//swal notificacion tipo toast
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

//Creo un Escuchador para el evento click del boton
document.getElementById("boton_ajax").addEventListener("click", llamadoAjax);

//funcion que se ejecuta cuando se hace click
function llamadoAjax() {
    //definir el objeto ajax
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        http_request = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE
        http_request = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    
    //http_request.overrideMimeType('text/xml');

    //definir funcion de respuesta del servidor
    http_request.onreadystatechange = resultadoCrear;

    //enviar variables al servidor
    var form = document.querySelector('form');
    var data = new FormData(form);
    //Prueba con variables separadas
    //var data2 = `numeroA=${document.querySelector('input[name="numeroA"]').value}&numeroB=${document.querySelector('input[name="numeroB"]').value}&operacion=${document.querySelector('select[name="operacion"]').value}`;
    //console.log(data2);
    //crear la peticion
    http_request.open('POST', 'http://localhost:800/src/controller/Controlador.php', true);
    http_request.send(data);  
}

function limpiarFormulario($id)
{
    document.getElementById($id).reset();
}

function resultadoCrear(){
    // procesar la respuesta
    if(http_request.readyState == 4){
        if (http_request.status == 200) {
            datos = JSON.parse(http_request.responseText);
            Toast.fire({
                icon: datos.icon,
                title: datos.title
            });                    
            refrescarTabla();
            limpiarFormulario('form-calculadora');
        } else if(http_request.status != 0) {
            //datos = JSON.parse(http_request.responseText);
            Toast.fire({
                icon: 'error',
                title: "error consultando el registro"
            });             
            
        }                        
    }
    
}

