<?php

class inicioController
{

    private $render;
    private $rolModel;
    private $viajeModel;
    public function __construct($render, $rolModel,$viajeModel)
    {
        $this->render = $render;
        $this->rolModel = $rolModel;
        $this->viajeModel = $viajeModel;
    }

    public function execute()
    {
        $this->direccionarSegunRol();

    }

    public function direccionarSegunRol()
    {

        if ($_SESSION["rol"] != null) {

            $rol = $this->rolModel->buscarRolNombre($_SESSION["rol"]);
            if($rol["rol"] == "chofer")
            {
                $viaje["viaje"]=$this->viajeModel->mostrarViaje($_SESSION["dni"]);

                echo  $this->render->render("view/partial/headerChofer.mustache",$_SESSION),
                $this->render->render("view/MiViaje.php",$viaje),
                print_r($viaje);
            }
            else{
                echo $this->render->render("view/partial/header" . ucfirst($rol["rol"]) . ".mustache", $_SESSION),
                $this->render->render("view/Inicio.php", $_SESSION),
                print_r($rol);
            }


        } else {
            $_SESSION["rol"] = "";
            echo $this->render->render("view/partial/header.mustache", $_SESSION["rol"]),
            $this->render->render("view/Inicio.php", $_SESSION["rol"]);

        }

    }


}