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

    public function listarServicesHechos()
    {
        $c=$this->database->prepare("select mantenimiento.id_mantenimiento, mantenimiento.fecha_mantenimiento , vehiculo.matricula , vehiculo.modelo , mantenimiento.detalle_service, mantenimiento.costo from mantenimiento inner JOIN vehiculo on mantenimiento.id_mantenimiento = vehiculo.id_mantenimiento");
        $c->execute();
        $service = $c->get_result();
        return $service->fetch_all();
    }
    public function buscarServiceDelVehiculo($idMantenimiento)
    {
        $c=$this->database->prepare("select mantenimiento.id_mantenimiento, mantenimiento.fecha_mantenimiento , vehiculo.matricula , vehiculo.modelo,vehiculo.marca, vehiculo.anio_fabricacion, vehiculo.ultimo_service, mantenimiento.detalle_service, mantenimiento.costo from mantenimiento inner JOIN vehiculo on mantenimiento.id_mantenimiento = vehiculo.id_mantenimiento
WHERE mantenimiento.id_mantenimiento = ?");
        $c->bind_param("i", $idMantenimiento);
        $c->execute();
        $service = $c->get_result();
        return $service->fetch_assoc();
    }
}