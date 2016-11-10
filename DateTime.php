<?php
/*
$datetime1 = new DateTime('1970-01-01'); // angegebenes Datum
var_dump($datetime1);

$datetime2 = new DateTime('1970-01-01 13:29');
var_dump($datetime2);

$datetime3 = new DateTime();
var_dump($datetime3);
$datetime4 = new DateTime('now');
var_dump($datetime4);
$datetime6 = new DateTime('');
var_dump($datetime6);
$datetime7 = new DateTime(false);
var_dump($datetime7);
*/

$datetime8 = new DateTime('+2 days');
var_dump($datetime8);

$datetime = new DateTime();
echo $datetime->format('Y-m-d') . '<hr>'; // ISO 8601
echo $datetime->format('d.m.Y') . '<hr>'; // deutsche Schreibweise
echo $datetime->format('H:i:s') . '<hr>'; // Uhrzeit

echo $datetime->modify('+1 week')->format('Y-m-d') . '<hr>';

$datetime1 = new DateTime('2013-12-18');
$datetime2 = new DateTime('now');
$differenz = $datetime2->diff($datetime1);
echo $differenz->format('%a'); // (absolute) Tage