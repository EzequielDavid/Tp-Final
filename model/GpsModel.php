<?php


class GpsModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function guardarPosicionActual($latitud,$longitud)
    {
        $c=$this->database->prepare("INSERT INTO gps ( latitud,longitud ) VALUES (?,?)");
        $c->bind_param("dd",$latitud,$longitud);
        $c->execute();

    }
}