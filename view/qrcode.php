<?php

include('../lib/qrlib.php');
$latitud = $_GET["latitud"];
$longitud = $_GET["longitud"];
QRcode::png("https://maps.googleapis.com/maps/api/staticmap?center=$latitud,$longitud&zoom=12&size=400x400&key=AIzaSyAtos2V7CDQqptgM-NABeC78oR1cIxfPGA");