<?php 
include_once '../../../configuracion.php';
$titulo="Buscar persona";
$link = "../";
$linkMenu = "../../";
include_once '../../Estructura/Header.php';

$datosFrom = data_submitted();
$objAbmPersona = new ABM_Persona();
$persona = $objAbmPersona->buscar(['NroDni'=>$datosFrom['NroDni']]);
?>

<?php
if (!empty($persona)) {
    $persona = $persona[0];
    //var_dump($persona);
    echo
    "
    <div class='container d-flex justify-content-center'>
        <div class='col-md-5'>
            <br>
            <div class='d-flex justify-content-center'>
                <h3>Actualizar datos</h3>
            </div>
            <div>
                <form name='formPersona' id='formPersona' method='post' action='../ActualizarDatosPersona.php' enctype='multipart/form-data'>
                    <label class='form-label' for='NroDni'>DNI</label>
                    <input class='form-control' type='number' name='NroDni' id='NroDni' readonly required style='color: gray' value=".$persona->getNroDni()."><br>
                    
                    <label class='form-label' for='Apellido'>Apellido</label>
                    <input class='form-control' type='text' name='Apellido' id='Apellido' required value=".$persona->getApellido()."><br>
                    
                    <label class='form-label' for='Nombre'>Nombre</label>
                    <input class='form-control' type='text' name='Nombre' id='Nombre' required value=".$persona->getNombre()."><br> 
                
                    <div class='d-flex justify-content-center'>
                        <input type='submit' value='Aceptar' class='btn btn-success col-md-5'>
                    </div>
                </form>
            </div>
        </div>
    </div><br>
    ";
} else {
    echo "<br>
         <div class='container col-md-6'>
             <div class='d-flex justify-content-center'>
                 <div class='alert alert-danger'>
                     <div>
                     <i class='bi bi-exclamation-triangle-fill'></i>
                     La persona ingresada no se encuentra en la base de datos
                     </div>
                 </div>
             </div>
         </div>
         <div class='d-flex justify-content-center''>
             <a href='../NuevaPersona.php' class='btn btn-success col-md-2'>Ingresar persona</a>
         </div><br>";
}

$src = "../../JS/NuevaPersona.js";
include_once '../../Estructura/footer.php';
?>