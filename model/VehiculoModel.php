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

    public function buscarVehiculo($matricula){
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `matricula` LIKE ?");
        $c->bind_param("s", $matricula);
        $c->execute();
        return $c->get_result()->fetch_assoc();

    }

    public function registrarVehiculo($matricula, $estado, $anio_fabricacion, $numero_chasis, $numero_motor, $marca, $modelo, $id_mantenimiento)
    {
        $c = $this->database->prepare("INSERT INTO `vehiculo`(`matricula`, `estado`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `marca`, `modelo`, `id_mantenimiento`) VALUES (?,?,?,?,?,?,?,?)");
        $c->bind_param("ssssissi", $matricula, $estado, $anio_fabricacion, $numero_chasis, $numero_motor, $marca, $modelo, $id_mantenimiento);
        $c->execute();
    }
}