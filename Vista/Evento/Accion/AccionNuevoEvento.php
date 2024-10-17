<?php 
include_once '../../../configuracion.php';
$titulo="Nuevo Evento";


require '../../../Utiles/Libreria/Calendario/vendor/autoload.php';
use benhall14\phpCalendar\Calendar as Calendar;

$datosForm = data_submitted();

$objEvento  = new ABM_Evento;
//['summary'=>$datosForm['summary'],
$eventos= $objEvento->Buscar(['summary'=>$datosForm['summary'],'start'=>$datosForm['start'],'end'=>$datosForm['end']]);
//print_r($eventos);

$icono = "<i class='bi bi-exclamation-triangle-fill'></i>";
if	(count($eventos)==0){
 
    $eventoDuplicado = false;
    foreach ($eventos as $evento) {

        if (
            ($datosForm['start'] >= $evento->getStart() && $datosForm['start'] <= $evento->getEnd()) || 
            ($datosForm['end'] >= $evento->getStart() && $datosForm['end'] <= $evento->getEnd()) || 
            ($datosForm['start'] <= $evento->getStart() && $datosForm['end'] >= $evento->getEnd())
        ) {
            $eventoDuplicado = true;
            break;
        }
    
    }
    
    if(!$eventoDuplicado){
      
	$respuesta=$objEvento->alta($datosForm);
	if ($respuesta) {
        $respuesta = "El evento fue ingresado correctamente";
        $icono = "<i class='bi bi-check-circle-fill'></i>";
        $alert = "success";
    } else {
        $respuesta = "El evento no fue ingresado"; 
        $alert = "danger";
    }  
    }


}else {
    $respuesta = "El evento ya fue seleccionado";
    $alert = "warning";
}

?>


<?php
$link = "../";
$linkMenu = "../../";
include_once "../../Estructura/Header.php";
?>

<div>
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
        <div class='d-flex justify-content-center'>
            <a href='../../Evento/NuevoEvento.php' class='btn btn-success col-md-2'>Volver</a>
        </div>
    </div><br>
    ";
    ?>
</div>
<?php
include_once "../../Estructura/footer.php";
?>


