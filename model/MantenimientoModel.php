<?php


class MantenimientoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function guardarMantenimiento($fechaMantenimiento,$detalleService,$costo){
        $c = $this->database->prepare("INSERT INTO `mantenimiento`(`fecha_mantenimiento`, `detalle_service`, `costo`) VALUES (?,?,?)");
        $c->bind_param("ssd", $fechaMantenimiento,$detalleService,$costo);
        $c->execute();
    }
}