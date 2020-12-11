<?php


class ViajeModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function crearViaje($cliente, $destino, $kmviaje, $matricula, $patente)
    {
        $c = $this->database->prepare("INSERT INTO viaje ( estado ,cliente, destino, km_recorridos, matricula , patente ) VALUES (?,?,?,?,?,?)");
        $estado = "preparando despacho";
        $c->bind_param("sssiss", $estado, $cliente, $destino, $kmviaje, $matricula, $patente);
        $c->execute();
    }

    public function crearViajeProforma($cliente, $origen, $destino, $fecha_carga, $eta)
    {
        $estado = "A preparar";
        $c = $this->database->prepare("INSERT INTO viaje ( estado, cliente ,origen, destino, fecha_carga, eta ) VALUES (?,?,?,?,?,?)");
        $c->bind_param("ssssss", $estado, $cliente, $origen, $destino, $fecha_carga, $eta);
        $c->execute();
    }

    public function actualizarEstadoDeViaje($codigo)
    {
        $c = $this->database->prepare("UPDATE viaje INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula INNER JOIN arrastre on vehiculo.patente = arrastre.patente INNER JOIN carga on arrastre.codigo = carga.codigo SET viaje.estado = 'preparando despacho' WHERE carga.codigo = ?");
        $c->bind_param("i", $codigo);
        $c->execute();
    }

    public function actualizarEstadoAEnViaje($idViaje)
    {
        $c = $this->database->prepare("UPDATE viaje  SET viaje.estado = 'En viaje' WHERE viaje.id_viaje = ?");
        $c->bind_param("i", $idViaje);
        $c->execute();
    }

    public function actualizarPosicionActual($idViaje, $latitud, $longitud)
    {
        $c = $this->database->prepare("UPDATE `vehiculo` SET `latitud` = ? , `longitud` = ? WHERE `vehiculo`.`matricula` = ?");
        $c->bind_param("dds", $latitud, $longitud, $idViaje);
        $c->execute();
    }

    public function buscarValorCombustiblePorIdViajes($idViaje)
    {
        $c = $this->database->prepare("SELECT combustible FROM `viaje` WHERE id_viaje = ?");
        $c->bind_param("i", $idViaje);
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_assoc();
    }

    public function actualizarDatosDeCombustible($combustible, $idViaje)
    {
        $c = $this->database->prepare("UPDATE viaje  SET viaje.combustible = ? WHERE viaje.id_viaje = ?");
        $c->bind_param("di", $combustible, $idViaje);
        $c->execute();
    }

    public function buscarValorPeajePorIdViajes($idViaje)
    {
        $c = $this->database->prepare("SELECT pasajes_peajes FROM `viaje` WHERE id_viaje = ?");
        $c->bind_param("d", $idViaje);
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_assoc();
    }

    public function actualizarDatosDe($datoAModificar, $valor)
    {
        $idViaje=$_POST["idViaje"];
        $c = $this->database->prepare("UPDATE viaje  SET viaje.$datoAModificar = ? WHERE viaje.id_viaje = ?");
        $c->bind_param("di", $valor, $idViaje);
        $c->execute();
    }

    public function buscarValor($valor)
    {
        $idViaje=$_POST["idViaje"];
        $c = $this->database->prepare("SELECT $valor FROM `viaje` WHERE id_viaje = ?");
        $c->bind_param("d", $idViaje);
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_assoc();
    }

    public function actualizarDatosDePeaje($peaje, $idViaje)
    {
        $c = $this->database->prepare("UPDATE viaje  SET viaje.pasajes_peajes = ? WHERE viaje.id_viaje = ?");
        $c->bind_param("di", $peaje, $idViaje);
        $c->execute();
    }

    public function actualizarEstadoViajeAFinalizado($idViaje)
    {
        $c = $this->database->prepare("UPDATE viaje  SET viaje.estado = 'Finalizado' WHERE viaje.id_viaje = ?");
        $c->bind_param("i", $idViaje);
        $c->execute();
    }

    public function asignarVehiculoAViaje($matricula, $cliente)
    {
        $c = $this->database->prepare("UPDATE viaje SET viaje.matricula = ? WHERE viaje.cliente = ?");
        $c->bind_param("si", $matricula, $cliente);
        $c->execute();
    }

    public function listarViajes()
    {
        $c = $this->database->prepare("SELECT viaje.id_viaje, viaje.estado,viaje.destino, viaje.cliente,viaje.matricula, usuario.dni, usuario.licencia_conduccion FROM `viaje` INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula
                                     INNER JOIN usuario on vehiculo.matricula = usuario.matricula where viaje.estado NOT LIKE 'A preparar' and viaje.id_viaje not LIKE 1");
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }

    public function listarViajesParaAsignarVehiculo()
    {
        $c = $this->database->prepare("SELECT * from viaje WHERE estado = 'A preparar'");
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }
 /*public function crearViajeProforma($cliente, $origen, $destino, $fecha_carga, $eta)

    {
        $c = $this->database->prepare("SELECT * from viaje WHERE estado = 'A preparar'");
        $c->execute();
	 }*/

    public function listarTodosLosViajes()
    {
        $c = $this->database->prepare("SELECT * FROM viaje");
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_all();
    }

    public function mostrarViaje($dni)
    {
        $c = $this->database->prepare("SELECT viaje.id_viaje, viaje.estado,viaje.destino, viaje.cliente,viaje.matricula, vehiculo.latitud, vehiculo.longitud, usuario.dni, usuario.licencia_conduccion FROM `viaje` INNER JOIN vehiculo on viaje.matricula = vehiculo.matricula INNER JOIN usuario on vehiculo.matricula = usuario.matricula where usuario.dni = ?
and viaje.estado not LIKE 'Finalizado'");
        $c->bind_param("i", $dni);
        $c->execute();
        $viaje = $c->get_result();
        return $viaje->fetch_assoc();
    }
}