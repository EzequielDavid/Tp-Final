<?php

include('../lib/qrlib.php');

//cambiar ruta según como está guardado el proyecto
QRcode::png("http://localhost/codigos/prog_web/index.php?module=chofer&action=mostrarViaje");