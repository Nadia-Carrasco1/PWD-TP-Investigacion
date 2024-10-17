<?php 
include_once '../../../configuracion.php';
$titulo="Buscar persona";
$link = "../";
$linkMenu = "../../";
include_once '../../Estructura/Header.php';

require '../../../Utiles/Libreria/Calendario/vendor/autoload.php';
use benhall14\phpCalendar\Calendar as Calendar;

$datosForm = data_submitted();

//$calendar = new Calendar;
//$calendar->useSpanish();
$objEvento  = new ABM_Evento;
$res=$objEvento->alta($datosForm);



//print_r($datosForm);
/*$events = array();

$events[] = array(
	'start' => $datosForm['start'] . " " . $datosForm['startTime'],
	'end' => $datosForm['end'] . " " . $datosForm['endTime'],
	'summary' => $datosForm['summary'],
	'mask' => true,
	'classes' => ['myclass', 'abc'],
    'event_box_classes' => ['event-box-1']
);

$calendario->addEvents($events)->setTimeFormat('00:00', '00:00', 30)->display(date('Y-m-d'), 'green');

//hacer para cuando el mes de finalizacion es diferente al del comienzo*/

/*$events = array();

	$events[] = array(
		'start' => '2024-10-17',
		'end' => '2024-10-20',
		'summary' => 'My Birthday',
		'mask' => true,
		'classes' => ['myclass', 'abc'],
        'event_box_classes' => ['event-box-1']
	);

	$events[] = array(
		'start' => '2024-10-18',
		'end' => '2024-10-19',
		'summary' => 'Christmas',
		'mask' => true
	);*/

//$calendar->addEvents($events);
//$calendar->display();
