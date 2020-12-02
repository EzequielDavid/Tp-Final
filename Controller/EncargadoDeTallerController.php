<?php


class EncargadoDeTallerController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render, $vehiculoModel)
    {
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;


    }

    public function listarVehiculosParaService()
    {
        $vehiculos["vehiculos"] = $this->vehiculoModel->listarVehiculosParaService();
        echo $this->render->render("view/partial/headerEncargadoDeTaller.mustache",$_SESSION),
        $this->render->render("view/ListadoDeVehiculosParaService.php",$vehiculos),print_r($vehiculos);
    }
}