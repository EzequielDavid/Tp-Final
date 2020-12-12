<?php


class VehiculoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listarVehiculos()
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `matricula` NOT LIKE 'ninguna'");
        return $this->listar($c, $vehiculo = "");
    }

    public function listarArrastre()
    {
        $c = $this->database->prepare("select * from arrastre where estado = ?");
        $disponible = "Disponible";
        $c->bind_param("s", $disponible);
        $c->execute();
        $arrastre = $c->get_result();
        return $arrastre->fetch_all();
    }

    public function listarBackupVehiculo()
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo_borrado`");
        return $this->listar($c, $vehiculo = "");
    }

    public function listarBackupArrastre()
    {
        $c = $this->database->prepare("SELECT * FROM `arrastre_borrado`");
        return $this->listar($c, $arrastre = "");
    }

    public function listarVehiculosSupervisor()
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `estado` LIKE 'disponible'");

        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();
    }

    public function listarVehiculosParaService()
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `estado` LIKE 'mantenimiento'");
        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();
    }

    public function asignarEstadoVehiculo($estado, $matricula)
    {
        $c = $this->database->prepare("UPDATE vehiculo SET estado = ? WHERE matricula = ?");
        $c->bind_param("ss", $estado, $matricula);
        $c->execute();
    }

    public function cambiarEstadoDeVehiculoAOcupadoYasignarArrastre($matricula, $patente)
    {
        $c = $this->database->prepare("UPDATE vehiculo SET estado = ? , patente = ? WHERE matricula = ?");
        $ocupado = "ocupado";
        $c->bind_param("sss", $ocupado, $patente, $matricula);
        $c->execute();
        $c = $this->database->prepare("UPDATE arrastre SET estado = ? WHERE patente = ?");
        $c->bind_param("s", $ocupado);
        $c->execute();
    }

    public function buscarVehiculo($matricula)
    {
        $c = $this->database->prepare("SELECT * FROM `vehiculo` WHERE `matricula` LIKE ?");
        $c->bind_param("s", $matricula);
        $c->execute();
        return $c->get_result()->fetch_assoc();
    }

    public function buscarArrastre($chasis)
    {
        $c = $this->database->prepare("SELECT * FROM `arrastre` WHERE `chasis` LIKE ?");
        $c->bind_param("i", $chasis);
        $c->execute();
        return $c->get_result()->fetch_assoc();
    }

    public function registrarArrastre($tipo, $patente, $chasis)
    {
        $c = $this->database->prepare("INSERT INTO `arrastre`(`tipo`, `patente`, `chasis`) VALUES (?,?,?)");
        $c->bind_param("ssi", $tipo, $patente, $chasis);
        $c->execute();
    }

    public function registrarVehiculo($matricula, $estado, $anio_fabricacion, $numero_chasis, $numero_motor, $marca, $modelo, $id_mantenimiento)
    {
        $c = $this->database->prepare("INSERT INTO `vehiculo`(`matricula`, `estado`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `marca`, `modelo`, `id_mantenimiento`) VALUES (?,?,?,?,?,?,?,?)");
        $c->bind_param("ssssissi", $matricula, $estado, $anio_fabricacion, $numero_chasis, $numero_motor, $marca, $modelo, $id_mantenimiento);
        $c->execute();
    }

    public function actualizarUltimaFechaDeMantenimiento($matricula, $fechaMantenimiento)
    {
        $c = $this->database->prepare("UPDATE vehiculo SET ultimo_service = ?, estado = ? WHERE matricula = ?");
        $disponible = "disponible";
        $c->bind_param("sss", $fechaMantenimiento, $disponible, $matricula);
        $c->execute();
    }

    public function buscarCargaConCuit($cuit)
    {
        $c = $this->database->prepare("SELECT * FROM `carga` WHERE `cuit` LIKE ?");
        $c->bind_param("i", $cuit);
        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_all();
    }

    public function buscarCargaConCodigo($codigo)
    {
        $c = $this->database->prepare("SELECT * FROM `carga` WHERE `codigo` LIKE ?");
        $c->bind_param("i", $codigo);
        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_assoc();
    }

    public function asignarCargaAarrastre($codigo, $patente)
    {
        $c = $this->database->prepare("UPDATE arrastre SET codigo = ? WHERE patente = ?");
        $c->bind_param("is", $codigo, $patente);
        $c->execute();
    }

    public function borrarVehiculo($matricula)
    {
        if ($this->buscarVehiculo($matricula) != null)
            $this->borrarVehiculoDeLaTabla("vehiculo", $matricula);

        else
            $this->borrarVehiculoDeLaTabla("vehiculo_borrado", $matricula);
    }

    public function borrarArrastre($chasis)
    {
        if ($this->buscarArrastre($chasis) != null)
            $this->borrarArrastreDeLaTabla("arrastre", $chasis);

        else
            $this->borrarArrastreDeLaTabla("arrastre_borrado", $chasis);
    }

    public function borrarVehiculoDeLaTabla($nombreTabla, $matricula)
    {
        $c = $this->database->prepare("DELETE FROM `$nombreTabla` WHERE `$nombreTabla`.`matricula` = ?");
        $c->bind_param("s", $matricula);
        $c->execute();
    }

    public function borrarArrastreDeLaTabla($nombreTabla, $chasis)
    {
        $c = $this->database->prepare("DELETE FROM `$nombreTabla` WHERE `$nombreTabla`.`chasis` = ?");
        $c->bind_param("i", $chasis);
        $c->execute();
    }

    public function listar($c, $tablaAListar)
    {
        $c->execute();
        $tablaAListar = $c->get_result();
        return $tablaAListar->fetch_all();
    }

    public function actualizarDatosDe($datoAModificar, $valor)
    {
        $matricula=$_POST["matricula"];
        $c = $this->database->prepare("UPDATE vehiculo SET vehiculo.$datoAModificar = ? WHERE vehiculo.matricula = ?");
        $c->bind_param("ds", $valor, $matricula);
        $c->execute();
    }

    public function buscarValorDe($valor)
    {
        $matricula=$_POST["matricula"];
        $c = $this->database->prepare("SELECT $valor FROM `vehiculo` WHERE matricula LIKE ?");
        $c->bind_param("s", $matricula);
        $c->execute();
        $vehiculo = $c->get_result();
        return $vehiculo->fetch_assoc();
    }
}