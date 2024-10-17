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

$objEvento= new ABM_Evento();



$paramEvento = "";
$eventos = $objEvento->buscar($paramEvento);
 foreach($eventos as $evento){
    
    $summary= $evento->getSummary();
    $start=$evento->getStart();
    $end= $evento->getEnd();
 
    $calendar->addEvent($start,$end,$summary,true,['myclass', 'abc'],['event-class', 'abc']);
}

//CALENDARIO MES ACTUAL
echo " 
            <div class='d-flex justify-content-center'>
                <h3>Eventos del Mes</h3>
            </div>
    ";
   
    echo $calendar->draw(date('Y-m-d'));

//CALENDARIO ANUAL
echo " 
            <div class='d-flex justify-content-center'>
                <h3>Eventos del Año</h3>
            </div>
    ";



for ($mes = 1; $mes <= 12; $mes++) {
    $primerDiaMes = sprintf('%s-%02d-01', date('Y'), $mes);
    echo $calendar->draw($primerDiaMes, 'green');
}

$calendar->stylesheet();



include_once "../Estructura/footer.php";
?>