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
$eventosOrdenados=null;
$eventos = $objEvento->buscar($paramEvento);
 foreach($eventos as $evento){
    
    $summary= $evento->getSummary();
    $start=$evento->getStart();
    $end= $evento->getEnd();
    $startTime=$evento->getStartTime();
    $endTime=$evento->getEndTime();

    $eventosOrdenados[]=array(
        'start'=>$start." ". substr($startTime, 0, 5),
        'end'=>$end." ". substr($endTime, 0, 5),
        'mask' => true,
        'classes' => ['myclass', 'abc']

    );

   $calendar->addEvent($start,$end,$summary,true,['myclass', 'abc'],['event-class', 'abc']);
}

//CALENDARIO SEMANAL
echo " 
            <div class='d-flex justify-content-center'>
                <h3>Eventos de la semana</h3>
            </div>
    ";
if($eventosOrdenados!=null){
    $calendar->addEvents($eventosOrdenados)->setTimeFormat('06:00', '21:00', 60)->useWeekView()->display(date('Y-m-d'), 'green');
} else{
    echo "No hay eventos";
}


$calendar->stylesheet();



include_once "../Estructura/footer.php";
?>