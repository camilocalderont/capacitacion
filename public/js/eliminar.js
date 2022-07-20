if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    requestConsultaEliminar = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE
    requestConsultaEliminar = new ActiveXObject("Microsoft.XMLHTTP");
} 

requestConsultaEliminar.onreadystatechange = resultadoConsultaEliminar;

function activarBotonesEliminar(){
    let botonesEditar = document.querySelectorAll(".eliminar-calculo");

    for (let i = 0; i < botonesEditar.length; i++) {
            botonesEditar[i].addEventListener("click", eliminarRegistro);
    }
}

function eliminarRegistro(){
    var idRegistro = this.dataset.id;

    Swal.fire({
        title: 'Confirmar Accion?',
        text: "Seguro que deseas eliminar el archivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            var data = new FormData();
            data.append('id',idRegistro);
        
            requestConsultaEliminar.open('POST', 'http://localhost:800/src/controller/ControladorConsultaEliminar.php', true);
            requestConsultaEliminar.send(data); 
        }
      })            
}


function resultadoConsultaEliminar(){
    // procesar la respuesta
    if(requestConsultaEliminar.readyState == 4){
        if (requestConsultaEliminar.status == 200) {
            datos = JSON.parse(requestConsultaEliminar.responseText);

            Toast.fire({
                icon: datos.icon,
                title: datos.title
            }); 
            refrescarTabla();

        } else if(requestConsultaEliminar.status != 0) {
            Toast.fire({
                icon: 'error',
                title: "error consultando el registro"
            });            
        }                        
    }
    
}