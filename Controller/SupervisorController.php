<?php


class SupervisorController
{
    private $render;
    private $usuarioModel;
    private $vehiculoModel;
    private $viajeModel;
    public function __construct($render,$usuarioModel,$vehiculoModel,$viajeModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
        $this->vehiculoModel = $vehiculoModel;
        $this->viajeModel = $viajeModel;
    }
    public function listarChoferes()
    {
        $choferes["choferes"]=$this->usuarioModel->listarChoferes();
        //  die($usuarios["usuarios"]);
        echo $this->render->render("view/partial/headerSupervisor.mustache",$_SESSION),
        $this->render->render("view/Choferes.php",$choferes);

    }
    public function prepararViaje()
    {

        $chofer= $this->usuarioModel->buscarUsuarioPorDni($_POST["dni"]);
        $vehiculo = $this->vehiculoModel->listarVehiculos();
        $arrastre = $this->vehiculoModel->listarArrastre();
        $datos["datos"] = array("chofer" => $chofer,"vehiculo" => $vehiculo, "arrastre" =>$arrastre);
        echo $this->render->render("view/partial/headerSupervisor.mustache",$_SESSION),
        $this->render->render("view/PrepararViaje.php",$datos),print_r($datos),"<br>",print_r($arrastre);

    }
    public function asignarViaje()
    {
        $this->viajeModel->crearViaje($_POST["cliente"],$_POST["destino"],$_POST["kmviaje"],$_POST["matricula"],$_POST["patente"]);
        $this->usuarioModel->asignarVehiculoAChofer($_POST["matricula"],$_POST["dni"]);
        $this->vehiculoModel->cambiarEstadoDeVehiculoAOcupado($_POST["matricula"]);
        echo $this->render->render("view/partial/headerSupervisor.mustache",$_SESSION),
        $this->render->render("view/Inicio.php");
    }
    public function detalleViaje()
    {
        $viaje["viaje"]=$this->viajeModel->mostrarViaje( $_POST["dni"]);
        echo $this->render->render("view/partial/headerSupervisor.mustache",$_SESSION),
        $this->render->render("view/DetalleViaje.php",$viaje);
    }
}