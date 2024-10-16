<?php
include_once '../../../configuracion.php';
$titulo = "Nueva persona";

$datosForm = data_submitted();

$objAbmPersona = new ABM_Persona();
$personaExiste = $objAbmPersona->buscar(['NroDni'=>$datosForm['NroDni']]);

$icono = "<i class='bi bi-exclamation-triangle-fill'></i>";
$alert = "danger";
if (count($personaExiste) == 0) {
    $respuesta = $objAbmPersona->alta($datosForm);
    if ($respuesta) {
        $respuesta = "La persona fue ingresada a la base de datos correctamente";
        $icono = "<i class='bi bi-check-circle-fill'></i>";
        $alert = "success";
    } else {
        $respuesta = "La persona no pudo se ingresada a la base de datos";
        $alert = "danger";
    }
} else {
    $respuesta = "La persona ya se encuentra en la base de datos";
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
            <a href='../../Evento/NuevoEvento.php' class='btn btn-success col-md-2'>Siguiente</a>
        </div>
    </div><br>
    ";
    ?>
</div>
<?php
include_once "../../Estructura/footer.php";
?>