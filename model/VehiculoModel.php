<?php


class VehiculoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listarVehiculos(){
        $c=$this->database->prepare("SELECT * FROM `vehiculo` WHERE `matricula` NOT LIKE 'ninguna'");

        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();
    }
    public function listarArrastre(){
        $c=$this->database->prepare("SELECT * FROM `arrastre` ");

        $c->execute();
        $arrastre = $c->get_result();
        return $arrastre->fetch_all();
    }
    public function cambiarEstadoDeVehiculoAOcupado($matricula)
    {
        $c=$this->database->prepare("UPDATE vehiculo SET estado = ? WHERE matricula = ?");
        $ocupado = "ocupado";
        $c->bind_param("ss", $ocupado,$matricula);
        $c->execute();
    }
}