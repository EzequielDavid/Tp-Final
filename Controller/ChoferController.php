<?php


class ChoferController
{
    private $render;
    private $usuarioModel;

    private $viajeModel;
    public function __construct($render,$usuarioModel,$viajeModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;

        $this->viajeModel = $viajeModel;
    }

    public function mostrarViaje()
    {
        $viaje["viaje"]=$this->viajeModel->mostrarViaje($_SESSION["dni"]);

        echo  $this->render->render("view/partial/headerChofer.mustache",$_SESSION),
              $this->render->render("view/MiViaje.php",$viaje["viaje"]);
    }
}