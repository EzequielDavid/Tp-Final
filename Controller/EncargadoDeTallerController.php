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

    }
}