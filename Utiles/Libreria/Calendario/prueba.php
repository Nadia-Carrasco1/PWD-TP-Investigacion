<?php 
require 'vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;


$calendar = new Calendar;
$calendar->stylesheet(); //aplica estilos


//(new Calendar)->display(); muestra calendario mensual actual
# change the weekly start date to "Monday"
$calendar->useMondayStartingDate();
    
# or revert to the default "Sunday"
$calendar->useSundayStartingDate();

# (optional) - if you want to use full day names instead of initials (ie, Sunday instead of S), apply the following:
$calendar->useFullDayNames();

# to revert to initials, use:
$calendar->useInitialDayNames();

# add your own table class(es)
$calendar->addTableClasses('class-1 class-2 class-3');
# or using an array of classes.
$calendar->addTableClasses(['class-1', 'class-2', 'class-3']);

# (optional) - if you want to hide certain weekdays from the calendar, for example a calendar without weekends, you can use the following methods:
$calendar->hideSaturdays();	# This will hide Saturdays
$calendar->hideSundays(); 		# This will hide Sundays
$calendar->hideMondays(); 		# This will hide Mondays
$calendar->hideTuesdays(); 		# This will hide Tuesdays
$calendar->hideWednesdays();	# This will hide Wednesdays
$calendar->hideThursdays();		# This will hide Thursdays
$calendar->hideFridays();		# This will hide Fridays

# (optional) - Translated Calendars - currently, there is only Spanish, but see "Translations" below for adding your own strings.
$calendar->useSpanish(); 

# if needed, add event
$calendar->addEvent(
    '2022-01-14',   # start date in either Y-m-d or Y-m-d H:i if you want to add a time.
    '2022-01-14',   # end date in either Y-m-d or Y-m-d H:i if you want to add a time.
    'My Birthday',  # event name text
    true,           # should the date be masked - boolean default true
    ['myclass', 'abc'],  # (optional) additional classes in either string or array format to be included on the event days
    ['event-class', 'abc']   # (optional) additional classes in either string or array format to be included on the event summary box
);

# or for multiple events

$events = array();

$events[] = array(
    'start' => '2022-01-14',
    'end' => '2022-01-14',
    'summary' => 'My Birthday',
    'mask' => true,
    'classes' => ['myclass', 'abc'],
    'event_box_classes' => ['event-box-1']
);

$events[] = array(
    'start' => '2022-12-25',
    'end' => '2022-12-25',
    'summary' => 'Christmas',
    'mask' => true
);

$calendar->addEvents($events);

# finally, to draw a calendar    
echo $calendar->draw(date('Y-m-d')); # draw this months calendar    

# this can be repeated as many times as needed with different dates passed, such as:    
echo $calendar->draw(date('Y-01-01')); # draw a calendar for January this year    
echo $calendar->draw(date('Y-02-01')); # draw a calendar for February this year    
echo $calendar->draw(date('Y-03-01')); # draw a calendar for March this year    
echo $calendar->draw(date('Y-04-01')); # draw a calendar for April this year    
echo $calendar->draw(date('Y-05-01')); # draw a calendar for May this year    
echo $calendar->draw(date('Y-06-01')); # draw a calendar for June this year    

# to use the pre-made color schemes, call the ->stylesheet() method and then pass the color choice to the draw method, such as:    
echo $calendar->draw(date('Y-m-d'));            # print a (default) turquoise calendar    
echo $calendar->draw(date('Y-m-d'), 'purple');  # print a purple calendar    
echo $calendar->draw(date('Y-m-d'), 'pink');    # print a pink calendar    
echo $calendar->draw(date('Y-m-d'), 'orange');  # print a orange calendar    
echo $calendar->draw(date('Y-m-d'), 'yellow');  # print a yellow calendar    
echo $calendar->draw(date('Y-m-d'), 'green');   # print a green calendar    
echo $calendar->draw(date('Y-m-d'), 'grey');    # print a grey calendar    
echo $calendar->draw(date('Y-m-d'), 'blue');    # print a blue calendar  

# you can also call ->display(), which handles the echo'ing and adding the stylesheet.
echo $calendar->display(date('Y-m-d')); # draw this months calendar    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/calendar.min.css">
</head>
<body>
    
</body>
</html>