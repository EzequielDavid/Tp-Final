<?php
class inicioController{

    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function execute()
    {
        echo $this->render->render("view/partial/header.mustache",$_SESSION),
        $this->render->render("view/Inicio.php",$_SESSION);
    }



}