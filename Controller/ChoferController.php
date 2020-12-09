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
              $this->render->render("view/MiViaje.php",$viaje),print_r($viaje);
    }
    public function enviarPosicionGps()
    {
        $viaje["viaje"] = $this->viajeModel->mostrarViaje($_SESSION["dni"]);
        $la = $_POST["latitud"];
        $lo = $_POST["longitud"];
        $this->viajeModel->actualizarPosicionActual($_POST["idViaje"], $_POST["latitud"], $_POST["longitud"]);
        echo $this->render->render("view/partial/headerChofer.mustache", $_SESSION),
        $this->render->render("view/MiViaje.php", $viaje);
    }
}