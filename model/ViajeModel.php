<?php


class ViajeModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function crearViaje($cliente,$destino,$kmviaje,$matricula,$patente)
    {
        $c=$this->database->prepare("INSERT INTO viaje ( cliente, destino, kilometro_viaje, matricula , patente ) VALUES (?,?,?,?,?)");
        $c->bind_param("ssiss",$cliente,$destino,$kmviaje,$matricula,$patente);
        $c->execute();
    }
}