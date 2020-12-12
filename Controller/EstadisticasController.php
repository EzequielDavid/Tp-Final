<?php


class EstadisticasController
{
    private $render;
    private $estadisticasModel;

    
    public function __construct($render,$estadisticasModel)
    {
        $this->render = $render;
        $this->estadisticasModel = $estadisticasModel;

    }
    

    function mostrarEstadisticas()
    {
        
        
        $estadisticas["estadisticas"]=$this->estadisticasModel->vehiculosFueraDeServicio();
        $viajes['viajes']=$this->estadisticasModel->totalViajesRealizados();
        $kilometros['kilometros']=$this->estadisticasModel->kilometrosTotalViajes();
        echo $this->render->render("view/partial/headerAdministrador.mustache",$_SESSION),
             $this->render->render("view/mostrarEstadisticas.php",$estadisticas),
             $this->render->render("view/ViajesRealizados.php",$viajes),
             $this->render->render("view/KilometrosTotalViaje.php",$kilometros); 

        // $viajes['viajes']=$this->estadisticasModel->totalViajesRealizados();
        //echo $this->render->render("view/ViajesRealizados.php",$viajes);
        
        //var_dump($viajes);
        
    }
}