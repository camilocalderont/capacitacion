<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="card p-2 m-2">
        <div class="card-title">
            <h5>Ingrese los datos Index New</h5>
        </div>
        <div class="card-body">            
            <form class="row"  method="POST" action="../src/controller/Controlador.php">
                <div class="mb-3 col-6">
                    <label for="numeroA" class="form-label">Numero A</label>
                    <input type="number" name="numeroA" class="form-control">
                </div>
                <div class="mb-3 col-6">
                    <label for="numeroB" class="form-label">Numero B</label>
                    <input type="number" name="numeroB" class="form-control">
                </div>  
                <div class="mb-3 col-6"> 
                    <label for="operacion" class="form-label">Operacion</label>
                    <select name="operacion" class="form-control">
                        <option value="1">Suma</option>
                        <option value="2">Resta</option>
                        <option value="3">Multiplicacion</option>
                        <option value="4">Division</option>
                    </select>
                </div>   
                <div class="mb-3 col-3">  
                    <label for="btn" class="form-label"></label>         
                    <button type="submit" class="btn btn-primary form-control">Guardar</button>
                </div>
                <div class="mb-3 col-3">
                    <label for="btn" class="form-label"></label> 
                    <button type="button" id="boton_ajax" class="btn btn-info form-control">Guardar Ajax</button>
                </div>
            </form>
            <div class="alert alert-success" id="div_respuesta" role="alert">
            
            </div>
        </div>
    </div>
    <div class="card p-2 m-2">
        <div class="card-title">
            <h5>Historial de operaciones</h5>
        </div>
        <div class="card-body"> 
            <div id="div_contenedorTabla"></div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/calculadora.js"></script>
    <script src="js/consulta.js"></script>
</body>
</html>