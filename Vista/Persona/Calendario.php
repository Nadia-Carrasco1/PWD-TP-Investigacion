<?php
include_once '../../configuracion.php';
$link = "";
$linkMenu = "../";
$titulo = "Calendario";
include_once "../Estructura/Header.php";

require '../../Utiles/Libreria/Calendario/vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;

$calendar = new Calendar;
$calendar->useSpanish(); 

$objPersona = new ABM_Persona();
$paramPersonas = "";
$todasLasPersonas = $objPersona->buscar($paramPersonas);

foreach($todasLasPersonas as $persona){
    $fechaNac=$persona->getFechaNac();
    $mes = substr($fechaNac, 5, 2);
    $dia = substr($fechaNac, 8, 2);
    $anio = date('Y');

    $nombreyapellido=$persona->getNombre()." ".$persona->getApellido();
    $fechaParaDibujar = sprintf('%s-%02d-%02d', $anio, $mes, $dia);

    $calendar->addEvent($fechaParaDibujar, $fechaParaDibujar, $nombreyapellido,true,['myclass', 'abc'],['event-class', 'abc'] );
}

for ($mes = 1; $mes <= 12; $mes++) {
    $primerDiaMes = sprintf('%s-%02d-01', date('Y'), $mes);
    echo $calendar->draw($primerDiaMes, 'green');
}
$calendar->stylesheet();



include_once "../Estructura/footer.php";
?>