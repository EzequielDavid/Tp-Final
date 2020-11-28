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

            echo $this->render->render("view/partial/header" . ucfirst($rol["rol"]) . ".mustache", $_SESSION),
            $this->render->render("view/Inicio.php", $_SESSION);
            echo "view/partial/header" . ucfirst($rol["rol"]) . ".mustache";
        } else {
            $_SESSION["rol"] ="";
            echo $this->render->render("view/partial/header.mustache", $_SESSION["rol"]),
            $this->render->render("view/Inicio.php", $_SESSION["rol"]);

        }
    }


}