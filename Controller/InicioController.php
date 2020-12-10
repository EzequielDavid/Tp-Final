<?php

class inicioController
{

    private $render;
    private $rolModel;

    public function __construct($render, $rolModel)
    {
        $this->render = $render;
        $this->rolModel = $rolModel;
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
                echo $this->render->render("view/partial/header" . ucfirst($rol["rol"]) . ".mustache", $_SESSION),
                $this->render->render("view/Miviaje.php", $_SESSION);
            }
            else{
                echo $this->render->render("view/partial/header" . ucfirst($rol["rol"]) . ".mustache", $_SESSION),
                $this->render->render("view/Inicio.php", $_SESSION);
            }


        } else {
            $_SESSION["rol"] = "";
            echo $this->render->render("view/partial/header.mustache", $_SESSION),
            $this->render->render("view/Inicio.php", $_SESSION);

        }

    }


}