<?php


class VehiculoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listarVehiculos(){
        $c=$this->database->prepare("SELECT * FROM `vehiculo` WHERE `matricula` != 'ninguna'");

        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_all();
    }
}