<?php
include_once '../../configuracion.php';
$link = "";
$linkMenu = "../";
$titulo = "Lista Eventos";
include_once '../Estructura/Header.php';

$objEvento = new ABM_Evento();
$paramEventos = "";
$eventos = $objEvento->buscar($paramEventos);

if (!empty($eventos)) {
    echo "
    <div class='container d-flex justify-content-center'>
        <div  class='col-md-10'><br>
            <div class='d-flex justify-content-center'>
                <h3>Todos los eventos</h3>
            </div>
            <div class='d-flex justify-content-center'>
                <table border='1' class='table table-sm text-center table-bordered'>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Finalización</th>
                        <th>Horario Inicio</th>
                        <th>Horario Finalización</th>
                    </tr>
                    <tr>";

                        foreach($eventos as $evento) {
                            echo "<tr class='table-active text-black'>";
                            echo    "<td class='bg-success'>" . $evento->getSummary();
                            echo    "<td class='table-success'>" . $evento->getStart();
                            echo    "<td class='table-success'>" . $evento->getEnd();
                            echo    "<td class='table-success'>" . $evento->getStartTime();
                            echo    "<td class='table-success'>" . $evento->getEndTime();
                            echo "</tr>";
                        }
                    
                echo "</tr>
                </table>
            </div>
        </div>
    </div>
    <div class='d-flex justify-content-center''>
        <a href='NuevoEvento.php' class='btn btn-success col-md-2'>Ingresar Evento</a>
    </div><br>";
} else {
    echo "<br>
    <div class='container col-md-6'>
        <div class='d-flex justify-content-center'>
            <div class='alert alert-success'>
                <div>
                No hay eventos 
                </div>
            </div>
        </div>
    </div>
    <div class='d-flex justify-content-center''>
        <a href='NuevoEvento.php' class='btn btn-success col-md-2'>Ingresar Evento</a>
    </div><br>
    ";
}

include_once '../Estructura/footer.php';
?>




