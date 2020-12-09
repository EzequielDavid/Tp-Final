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

    public function crearViajeProforma($cliente,$origen,$destino,$fecha_carga,$eta)
    {
        $c=$this->database->prepare("INSERT INTO viaje (estado, origen, destino, fecha_carga , eta ) VALUES (?,?,?,?,?)");
         $estado = "preparando despacho";
        $c->bind_param("issss",$cliente,$origen,$destino,$fecha_carga,$eta);
        $c->execute();
    }

    public function listarViajes()
    {
        $c=$this->database->prepare("SELECT viaje.id_viaje, viaje.estado,viaje.destino, viaje.cliente,viaje.matricula, usuario.dni, usuario.licencia_conduccion FROM `viaje` INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula
                                     INNER JOIN usuario on vehiculo.matricula = usuario.matricula where viaje.estado NOT LIKE 'A preparar' and viaje.id_viaje not LIKE 1;");
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }

    public function listarViajesParaAsignarVehiculo()
    {
        $c=$this->database->prepare("SELECT * from viaje WHERE estado = 'A preparar'");
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }
    public function mostrarViaje($dni)
    {
        $c=$this->database->prepare("SELECT viaje.id_viaje, viaje.estado,viaje.destino, viaje.cliente,viaje.matricula, usuario.dni, usuario.licencia_conduccion FROM `viaje` INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula INNER JOIN usuario on vehiculo.matricula = usuario.matricula where usuario.dni = ?");
        $c->bind_param("i",$dni);
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }
    public function crearViajeProforma($cliente, $origen, $destino, $fecha_carga, $eta)
    {
        $estado = "A preparar";
        $c=$this->database->prepare("INSERT INTO viaje ( estado, cliente ,origen, destino, fecha_carga, eta ) VALUES (?,?,?,?,?,?)");
        $c->bind_param("ssssss",$estado,$cliente, $origen, $destino, $fecha_carga, $eta);
        $c->execute();
    }

    public function asignarVehiculoAViaje($matricula,$cliente)
{
    $c=$this->database->prepare("UPDATE viaje SET viaje.matricula = ? WHERE viaje.cliente = ?");
    $c->bind_param("si",$matricula,$cliente);
    $c->execute();

}
    public function actualizarEstadoDeViaje($codigo)
    {
        $c=$this->database->prepare("UPDATE viaje INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula INNER JOIN arrastre on vehiculo.patente = arrastre.patente INNER JOIN carga on arrastre.codigo = carga.codigo SET viaje.estado = 'preparando despacho' WHERE carga.codigo = ?");
        $c->bind_param("i",$codigo);
        $c->execute();
    }

    public function actualizarPosicionActual($idViaje,$latitud,$longitud)
    {
        $c=$this->database->prepare("UPDATE `vehiculo` SET `latitud` = ? , `longitud` = ? WHERE `vehiculo`.`matricula` = ?");
        $c->bind_param("dds",$latitud,$longitud,$idViaje);
        $c->execute();
    }
}