<?php


class ViajeController
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
    function listarViajes()
    {
        $choferes["viajes"]=$this->viajeModel->listarViajes();
        //  die($usuarios["usuarios"]);
        echo $this->render->render("view/partial/headerSupervisor.mustache",$_SESSION),
        $this->render->render("view/Viajes.php",$choferes),print_r($choferes);
    }
}