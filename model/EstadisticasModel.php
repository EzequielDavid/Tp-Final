<?php


class EstadisticasModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }


    public function totalViajesRealizados()
    {
        
       $c = $this->database->prepare("SELECT count(*) as total FROM viaje WHERE estado = ?");
        $estado="finalizado";
        $c->bind_param("s", $estado );
        $c->execute();
        $viajes = $c->get_result();
        return $viajes->fetch_assoc();

    }

    public function totalKilometrosRecorridos()
    {
      
        $c = $this->database->prepare("SELECT sum(km_recorridos) as total FROM viaje WHERE estado=?");
        $estado="finalizado";
        $c->bind_param("s",$estado);
        $c->execute();
        $kilometros = $c->get_result();
        return $kilometros->fetch_assoc();

    }

    public function totalViajesEnCurso()
    {
        
       $c = $this->database->prepare("SELECT count(*) as total FROM viaje WHERE estado = ?");
        $estado="En curso";
        $c->bind_param("s", $estado);
        $c->execute();
        $viajes = $c->get_result();
        return $viajes->fetch_assoc();

    }

    public function totalViajesPendientes()
    {
        
       $c = $this->database->prepare("SELECT count(*) as total FROM viaje WHERE estado = ?");
        $estado="A preparar";
        $c->bind_param("s", $estado );
        $c->execute();
        $viajes = $c->get_result();
        return $viajes->fetch_assoc();

    }

     

    public function vehiculosFueraDeServicio()
    {

        
        $c = $this->database->prepare("SELECT count(*) as total  FROM vehiculo v  WHERE estado = ?");
        $estado='Mantenimiento';
        $c->bind_param("s",$estado);
        $c->execute();
        $vehiculos = $c->get_result();
        return $vehiculos->fetch_assoc();

    }

    public function totalVehiculosDisponibles()
    {

        
        $c = $this->database->prepare("SELECT count(*) as total  FROM vehiculo   WHERE estado = ?");
        $estado='Disponible';
        $c->bind_param("s",$estado);
        $c->execute();
        $vehiculos = $c->get_result();
        return $vehiculos->fetch_assoc();

    }

    public function totalVehiculosOcupados()
    {

        
        $c = $this->database->prepare("SELECT count(*) as total  FROM vehiculo   WHERE estado = ?");
        $estado='Ocupado';
        $c->bind_param("s",$estado);
        $c->execute();
        $vehiculos = $c->get_result();
        return $vehiculos->fetch_assoc();

    }

    public function gastoTotalMantenimiento()
    {
      
        $c = $this->database->prepare("SELECT sum(costo) as total FROM mantenimiento");
        //$estado="finalizado";
        //$c->bind_param("s",$estado);
        $c->execute();
        $kilometros = $c->get_result();
        return $kilometros->fetch_assoc();

    }
    
    public function totalDeVehiculos()
    {
      
        $c = $this->database->prepare("SELECT count(*) as total FROM vehiculo");
        //$estado="finalizado";
        //$c->bind_param("s",$estado);
        $c->execute();
        $vehiculos = $c->get_result();
        return $vehiculos->fetch_assoc();

    }

    public function totalDeArrastres()
    {
      
        $c = $this->database->prepare("SELECT count(*) as total FROM arrastre ");
        //$estado="finalizado";
        //$c->bind_param("s",$estado);
        $c->execute();
        $arrastres = $c->get_result();
        return $arrastres->fetch_assoc();

    }

    public function totalArrastresOcupados()
    {
      
        $c = $this->database->prepare("SELECT count(*) as total FROM arrastre WHERE estado = ?");
        $estado="Ocupado";
        $c->bind_param("s",$estado);
        $c->execute();
        $arrastres = $c->get_result();
        return $arrastres->fetch_assoc();

    }

    public function totalArrastresDisponibles()
    {
      
        $c = $this->database->prepare("SELECT count(*) as total FROM arrastre WHERE estado = ?");
        $estado="Disponible";
        $c->bind_param("s",$estado);
        $c->execute();
        $arrastres = $c->get_result();
        return $arrastres->fetch_assoc();

    }
}