<?php


class EncargadoDeTallerController
{
    private $render;
    private $vehiculoModel;
    private $mantenimientoModel;
    public function __construct($render, $vehiculoModel,$mantenimientoModel)
    {
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
        $this->mantenimientoModel = $mantenimientoModel;

    }

    public function listarVehiculosParaService()
    {
        $vehiculos["vehiculos"] = $this->vehiculoModel->listarVehiculosParaService();
        echo $this->render->render("view/partial/headerEncargadoDeTaller.mustache",$_SESSION),
        $this->render->render("view/ListadoDeVehiculosParaService.php",$vehiculos),print_r($vehiculos);
    }
    public function mantenimiento()
    {
        $vehiculo["vehiculo"] = $this->vehiculoModel->buscarVehiculo($_POST["matricula"]);
        echo $this->render->render("view/partial/headerEncargadoDeTaller.mustache",$_SESSION),
        $this->render->render("view/Mantenimiento.php",$vehiculo),print_r($vehiculo);
    }
    public function guardarMantenimiento()
    {
        $this->mantenimientoModel->guardarMantenimiento($_POST["fechaMantenimiento"],$_POST["detalleService"],$_POST["costo"]);
        $this->vehiculoModel->actualizarUltimaFechaDeMantenimiento($_POST["matricula"],$_POST["fechaMantenimiento"]);
        $vehiculos["vehiculos"] = $this->vehiculoModel->listarVehiculosParaService();
        echo $this->render->render("view/partial/headerEncargadoDeTaller.mustache",$_SESSION),
        $this->render->render("view/ListadoDeVehiculosParaService.php",$vehiculos),print_r($vehiculos);
    }
}