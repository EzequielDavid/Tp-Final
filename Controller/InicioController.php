<?php

class inicioController{

    private $render;
    private $rolModel;
    public function __construct($render,$rolModel)
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
        while ($_SESSION["rol"] != null)
        {
            $rol= $this->rolModel->buscarRolNombre($_SESSION["rol"]);
            $rolNombre = $rol["rol"];
            echo $this->render->render("view/partial/header".ucfirst($rolNombre).".mustache",$_SESSION),
            $this->render->render("view/Inicio.php",$_SESSION);
        }
        echo $this->render->render("view/partial/header.mustache",$_SESSION),
        $this->render->render("view/Inicio.php",$_SESSION);
    }


}