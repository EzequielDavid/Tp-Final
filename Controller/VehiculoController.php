<?php


class VehiculoController
{
    private $render;
    private $vehiculoModel;

    public function __construct($render, $vehiculoModel)
    {
        $this->render = $render;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function listarVehiculos()
    {
        $vehiculos["vehiculos"] = $this->vehiculoModel->listarVehiculos();

        $this->renderTo($vehiculos, "ListadoDeVehiculos.php");
    }


    public function listarArrastres()
    {
        $arrastres["arrastres"] = $this->vehiculoModel->listarArrastre();

        $this->renderTo($arrastres, "ListadoDeArrastres.php");
    }


    public function listarBackupVehiculo()
    {
        $vehiculos["vehiculos"] = $this->vehiculoModel->listarBackupVehiculo();

        $this->renderTo($vehiculos, "ListadoDeVehiculos.php");
    }

    public function listarBackupArrastres()
    {
        $arrastres["arrastres"] = $this->vehiculoModel->listarBackupArrastre();

        $this->renderTo($arrastres, "ListadoDeArrastres.php");
    }

    public function registrarVehiculo()
    {
        $this->renderTo(null, "RegistrarVehiculo.php");
    }

    public function registrarArrastre()
    {
        $this->renderTo(null, "RegistrarArrastre.php");
    }


    public function agregarVehiculo()
    {
        $vehiculoAAgregar = $this->vehiculoModel->buscarVehiculo($_POST["matricula"]);

        $this->guardarDatosNuevoVehiculo();
    }

    public function agregarArrastre()
    {
        $this->guardarDatosNuevoArrastre();
    }


    public function consultarVehiculo()
    {
        $vehiculo['vehiculo']= $this->vehiculoModel->buscarVehiculo($_POST["matricula"]);
        $this->renderTo($vehiculo, "DetalleVehiculo.php");

    }

    public function borrarVehiculo(){
        $this->vehiculoModel->borrarVehiculo($_POST["matricula"]);
        $this->listarVehiculos();
    }

    public function borrarArrastre(){
        $this->vehiculoModel->borrarArrastre($_POST["chasis"]);
        $this->listarArrastres();
    }

    /**
     * @param $vehiculos
     */
    public function renderTo($vehiculos, $view)
    {
        echo $this->render->render("view/partial/headerAdministrador.mustache", $_SESSION),
        $this->render->render("view/$view", $vehiculos);
    }

    public function renderMultipleTo($vehiculos, $arraste, $view)
    {
        echo $this->render->render("view/partial/headerAdministrador.mustache", $_SESSION),
        $this->render->render("view/$view", $vehiculos, $arraste);
    }

    public function guardarDatosNuevoVehiculo()
    {
        $matricula = $_POST["matricula"];
        $estado = $_POST["estado"];
        $anio_fabricacion = $_POST["anio_fabricacion"];
        $numero_chasis = $_POST["numero_chasis"];
        $numero_motor = $_POST["numero_motor"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $id_mantenimiento = null;
        $this->vehiculoModel->registrarVehiculo($matricula, $estado, $anio_fabricacion, $numero_chasis, $numero_motor, $marca, $modelo, $id_mantenimiento);
        $this->listarVehiculos();
        die();
    }

    public function guardarDatosNuevoArrastre()
    {
        $tipo = $_POST["tipo"];
        $patente = $_POST["patente"];
        $chasis = $_POST["chasis"];
        $this->vehiculoModel->registrarArrastre($tipo, $patente, $chasis);
        $this->listarArrastres();
        die();
    }
}