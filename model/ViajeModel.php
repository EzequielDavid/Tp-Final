<?php


class ViajeModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function crearViaje($cliente,$destino,$kmviaje,$matricula,$patente)
    {
        $c=$this->database->prepare("INSERT INTO viaje ( estado ,cliente, destino, kilometro_viaje, matricula , patente ) VALUES (?,?,?,?,?,?)");
        $estado = "preparando despacho";
        $c->bind_param("sssiss",$estado,$cliente,$destino,$kmviaje,$matricula,$patente);
        $c->execute();
    }
    public function listarViajes()
    {
        $c=$this->database->prepare("SELECT viaje.id_viaje, viaje.estado,viaje.destino, viaje.cliente,viaje.matricula, usuario.dni, usuario.licencia_conduccion FROM `viaje` INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula
                                     INNER JOIN usuario on vehiculo.matricula = usuario.matricula;");
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }
    public function mostrarViaje($dni)
    {
        $c=$this->database->prepare("SELECT viaje.id_viaje , viaje.destino , viaje.estado, viaje.kilometro_viaje FROM `viaje` INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula INNER JOIN usuario on vehiculo.matricula = usuario.matricula
                            where usuario.dni = ?");
        $c->bind_param("i",$dni);
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }
}