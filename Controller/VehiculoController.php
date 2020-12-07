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

    public function listarBackupVehiculo()
    {
        $vehiculos["vehiculos"] = $this->vehiculoModel->listarBackupVehiculo();

        $this->renderTo($vehiculos, "ListadoDeVehiculos.php");
    }

    public function registrarVehiculo()
    {
        $this->renderTo(null, "RegistrarVehiculo.php");
    }

    public function agregarVehiculo()
    {
        $vehiculoAAgregar = $this->vehiculoModel->buscarVehiculo($_POST["matricula"]);

        $this->guardarDatosNuevoVehiculo();
    }

    public function borrarVehiculo(){
        $this->vehiculoModel->borrarVehiculo($_POST["matricula"]);
        $this->listarVehiculos();

    }

    /**
     * @param $vehiculos
     */
    public function renderTo($vehiculos, $view)
    {
        echo $this->render->render("view/partial/headerAdministrador.mustache", $_SESSION),
        $this->render->render("view/$view", $vehiculos);
    }

    public function irPaginaError($mensajeError)
    {
        echo $this->render->render("view/partial/headerAdministrador.mustache", $_SESSION),
        $this->render->render("view/PaginaError.php", $mensajeError);
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
}