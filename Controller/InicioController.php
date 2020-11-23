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



}