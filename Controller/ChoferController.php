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
              $this->render->render("view/MiViaje.php",$viaje);
    }
    public function enviarPosicionGps()
    {
        $viaje["viaje"] = $this->viajeModel->mostrarViaje($_SESSION["dni"]);
        if($viaje["viaje"]["latitud"] == 0 && $viaje["viaje"]["longitud"] == 0)
        {
            $this->viajeModel->actualizarEstadoViajeAenViaje( $viaje["viaje"]["id_viaje"]);

            $this->viajeModel->actualizarPosicionActual($_POST["matricula"], $_POST["lati"], $_POST["longi"]);
            echo $this->render->render("view/partial/headerChofer.mustache", $_SESSION),
            $this->render->render("view/MiViaje.php", $viaje);
        }
        else
        {

            $this->viajeModel->actualizarPosicionActual($_POST["matricula"], $_POST["lati"], $_POST["longi"]);
            echo $this->render->render("view/partial/headerChofer.mustache", $_SESSION),
            $this->render->render("view/MiViaje.php", $viaje);
        }

    }

    public function actualizarGastoCombustible()
    {
        $total = 0;
        $combustible = $this->viajeModel->buscarValorCombustiblePorIdViajes($_POST["idViaje"]);
        $total = $combustible["combustible"] + $_POST["combustible"];
        $this->viajeModel->actualizarDatosDeCombustible($total,$_POST["idViaje"]);
        $viaje["viaje"] = $this->viajeModel->mostrarViaje($_SESSION["dni"]);
        echo $this->render->render("view/partial/headerChofer.mustache", $_SESSION),
        $this->render->render("view/MiViaje.php", $viaje);
    }
    public function actualizarGastoPeaje()
    {
        $total = 0;
        $peaje = $this->viajeModel->buscarValorPeajePorIdViajes($_POST["idViaje"]);
        $total = $peaje["peaje"] + $_POST["peaje"];
        $this->viajeModel->actualizarDatosDePeaje($total,$_POST["idViaje"]);
        $viaje["viaje"] = $this->viajeModel->mostrarViaje($_SESSION["dni"]);
        echo $this->render->render("view/partial/headerChofer.mustache", $_SESSION),
        $this->render->render("view/MiViaje.php", $viaje);
    }

    public function finalizarViaje()
    {
        $viaje["viaje"] = $this->viajeModel->mostrarViaje($_SESSION["dni"]);
        $this->viajeModel->actualizarEstadoViajeAfinalizarViaje($viaje["viaje"]["id_viaje"]);
        echo $this->render->render("view/partial/headerChofer.mustache", $_SESSION),
        $this->render->render("view/MiViaje.php");
    }
}