<?php
include_once '../../configuracion.php';
$link = "";
$linkMenu = "../";
$titulo = "Lista personas";
include_once '../Estructura/Header.php';

$objPersona = new ABM_Persona();
$paramPersonas = "";
$todasLasPersonas = $objPersona->buscar($paramPersonas);

if (!empty($todasLasPersonas)) {
    echo "
    <div class='container d-flex justify-content-center'>
        <div  class='col-md-10'><br>
            <div class='d-flex justify-content-center'>
                <h3>Todas las personas</h3>
            </div>
            <div class='d-flex justify-content-center'>
                <table border='1' class='table table-sm text-center table-bordered'>
                    <tr>
                        <th>DNI</th>
                        <th>Apellido</th>
                        <th>Nombre</th>

                    </tr>
                    <tr>";

                        foreach($todasLasPersonas as $unaPersona) {
                            echo "<tr class='table-active text-black'>";
                            echo    "<td class='bg-success'>" . $unaPersona->getNroDni();
                            echo    "<td class='table-success'>" . $unaPersona->getApellido();
                            echo    "<td class='table-success'>" . $unaPersona->getNombre();
                            echo "</tr>";
                        }
                    
                echo "</tr>
                </table>
            </div>
        </div>
    </div>
    <div class='d-flex justify-content-center''>
        <a href='Calendario.php' class='btn btn-success col-md-2'>Ver Calendario</a>
    </div><br>";
} else {
    echo "<br>
    <div class='container col-md-6'>
        <div class='d-flex justify-content-center'>
            <div class='alert alert-success'>
                <div>
                No hay personas cargadas en la base de datos
                </div>
            </div>
        </div>
    </div>
    <div class='d-flex justify-content-center''>
        <a href='NuevaPersona.php' class='btn btn-success col-md-2'>Ingresar una persona</a>
    </div><br>
    ";
}

include_once '../Estructura/footer.php';
?>




