<?php 
include_once '../../configuracion.php';
$titulo="Actualizar datos persona";
$link = "";
$linkMenu = "../";
include_once '../Estructura/Header.php';

$datosForm = data_submitted();
$objAbmPersona = new ABM_Persona();

$alert = "warning";
$icono = "<i class='bi bi-exclamation-triangle-fill'></i>";
$respuesta = "No se ingresaron datos para actualizar";
if ($objAbmPersona->modificacion($datosForm)) {
    $alert = "success";
    $icono = "<i class='bi bi-check-circle-fill'></i>";
    $respuesta = "Las datos fueron actualizados correctamente";
}
?>

<?php
echo "<br>
<div class='container col-md-6'>
    <div class='d-flex justify-content-center'>
        <div class='alert alert-$alert'>
            <div>
            $icono
            $respuesta
            </div>
        </div>
    </div>
</div>
<div class='d-flex justify-content-center''>
    <a href='BuscarPersona.php' class='btn btn-success col-md-1'>Volver</a>
</div><br>";

include_once '../Estructura/footer.php';
?>