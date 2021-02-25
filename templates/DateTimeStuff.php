<?php
$format = 'Y-m-d|';
$date = date_create_from_format($format, '2019-04-18');
var_dump($date);

$time = '12:34:56';
list($hour,$min,$sec) = explode(':', $time);
print $hour . PHP_EOL . $min . PHP_EOL . $sec;

$date = '2019-12-23';
list($year,$month,$day) = explode('-',$date);
if (checkdate($month,$day,$year)) {
    print PHP_EOL . $year . PHP_EOL . $month . PHP_EOL . $day;
}
if (!empty($date)) {
    list($year,$month,$day) = explode('-',$date);
    if (checkdate($month,$day,$year)){
        print PHP_EOL . $year . PHP_EOL . $month . PHP_EOL . $day . 'It works';
    }
}