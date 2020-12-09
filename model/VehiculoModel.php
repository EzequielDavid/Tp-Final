<?php


class VehiculoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listarVehiculos()
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `matricula` NOT LIKE 'ninguna'");

        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();
    }

    public function listarVehiculosSupervisor()
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `estado` LIKE 'disponible'");

        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();
    }

    public function listarVehiculosParaService()
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `estado` LIKE 'mantenimiento'");

        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();
    }

    public function asignarEstadoVehiculo($estado, $matricula)
    {
        $c = $this->database->prepare("UPDATE vehiculo SET estado = ? WHERE matricula = ?");
        $c->bind_param("ss", $estado, $matricula);
        $c->execute();
    }

    public function listarArrastre()
    {
        $c = $this->database->prepare("select * from arrastre where estado = ?");
        $disponible = "disponible";
        $c->bind_param("s", $disponible);
        $c->execute();
        $arrastre = $c->get_result();
        return $arrastre->fetch_all();
    }

    public function cambiarEstadoDeVehiculoAOcupadoYasignarArrastre($matricula,$patente)
    {
        $c = $this->database->prepare("UPDATE vehiculo SET estado = ? , patente = ? WHERE matricula = ?");
        $ocupado = "ocupado";
        $c->bind_param("sss", $ocupado, $patente, $matricula);
        $c->execute();
        $c = $this->database->prepare("UPDATE arrastre SET estado = ? WHERE patente = ?");
          $c->bind_param("s", $ocupado);
        $c->execute();
    }

    public function buscarVehiculo($matricula)
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `matricula` LIKE ?");
        $c->bind_param("s", $matricula);
        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();

    }

    public function registrarVehiculo($matricula, $estado, $anio_fabricacion, $numero_chasis, $numero_motor, $marca, $modelo, $id_mantenimiento)
    {
        $c = $this->database->prepare("INSERT INTO `vehiculo`(`matricula`, `estado`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `marca`, `modelo`, `id_mantenimiento`) VALUES (?,?,?,?,?,?,?,?)");
        $c->bind_param("ssssissi", $matricula, $estado, $anio_fabricacion, $numero_chasis, $numero_motor, $marca, $modelo, $id_mantenimiento);
        $c->execute();
    }

    public function actualizarUltimaFechaDeMantenimiento($matricula, $fechaMantenimiento)
    {
        $c = $this->database->prepare("UPDATE vehiculo SET ultimo_service = ?, estado = ? WHERE matricula = ?");
        $disponible = "disponible";
        $c->bind_param("sss", $fechaMantenimiento, $disponible, $matricula);
        $c->execute();
    }
    public function buscarCargaConCuit($cuit)
{
    $c = $this->database->prepare("SELECT * FROM `carga` WHERE `cuit` LIKE ?");
    $c->bind_param("i", $cuit);
    $c->execute();
    $vehiculo = $c->get_result();
    return $vehiculo->fetch_all();
}
    public function asignarCargaAarrastre($codigo,$patente)
    {
        $c = $this->database->prepare("UPDATE arrastre SET codigo = ? WHERE patente = ?");
        $c->bind_param("is", $codigo,$patente);
        $c->execute();
    }

}