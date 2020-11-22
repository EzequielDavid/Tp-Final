<?php


class VehiculoController
{
    private $render;
    private $vehiculoModel;
    public function __construct($render,$vehiculoModel)
    {
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function listarVehiculos()
    {
        $vehiculos["vehiculos"]=$this->vehiculoModel->listarVehiculos();

        echo $this->render->render("view/partial/headerAdministrador.mustache",$_SESSION),
        $this->render->render("view/ListadoDeVehiculos.php",$vehiculos);
    }
}