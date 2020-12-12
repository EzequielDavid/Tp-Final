<?php


class EstadisticasModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }



    public function vehiculosFueraDeServicio()
    {

        
        $c = $this->database->prepare("SELECT count(*) as cantidad  FROM vehiculo v  WHERE estado = ?");
        $estado='Mantenimiento';
        $c->bind_param("s",$estado);
        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_assoc();

    }


    public function kilometrosTotalViajes()
    {
      
        $c = $this->database->prepare("SELECT sum(kilometro_viaje) as kilometros FROM viaje WHERE estado = ?");
        $c->bind_param("s", $estado="finalizado");
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();

    }


    public function totalViajesRealizados()
    {
        
       $c = $this->database->prepare("SELECT count(*) as cantidad FROM viaje WHERE estado = ?");
        $estado='finalizado';
        $c->bind_param("s", $estado );
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_assoc();

    }
    
}