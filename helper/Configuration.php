<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");
include_once ("model/UsuarioModel.php");
include_once ("model/VehiculoModel.php");
include_once ("model/RolModel.php");
include_once ("model/ViajeModel.php");
include_once ("model/ClienteModel.php");
include_once ("model/GpsModel.php");
include_once ("model/SupervisorModel.php");
include_once("Controller/InicioController.php");
include_once ("Controller/UsuarioController.php");
include_once ("Controller/VehiculoController.php");
include_once ("Controller/SupervisorController.php");
include_once ("Controller/ViajeController.php");
include_once ("Controller/ChoferController.php");
include_once ("Controller/ClienteController.php");
include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration{


    private function getDatabase(){
        $config = $this->getConfig();
        return new mysqli(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfig(){
        return parse_ini_file("config/config.ini");
    }


    public function getRender(){
        return new Render('view/partial');
    }

    public function getSupervisorController(){
        $usuarioModel = $this->getUsuarioModel();
        $vehiculoModel = $this->getVehiculoModel();
        $viajeModel = $this->getViajeModel();
        $clienteModel = $this->getClienteModel();
        $supervisorModel = $this->getSupervisorModel();
        return new SupervisorController($this->getRender(),$usuarioModel,$vehiculoModel,$viajeModel,$clienteModel,$supervisorModel);
    }

    public function getSupervisorModel()
    {
        $database = $this->getDatabase();
        return new SupervisorModel($database);
    }
    public function getInicioController(){
        $rolModel = $this->getRolModel();
        $viajeModel = $this->getViajeModel();
        return new InicioController($this->getRender(),$rolModel,$viajeModel);
    }
    public function getUsuarioModel(){
        $database = $this->getDatabase();
        return new UsuarioModel($database);
    }
    public function getRolModel(){
        $database = $this->getDatabase();
        return new RolModel($database);
    }
    public function getViajeModel()
    {
        $database = $this->getDatabase();
        return new ViajeModel($database);
    }
    public function getViajeController()
    {
        $usuarioModel = $this->getUsuarioModel();
        $viajeModel = $this->getViajeModel();
        return new ViajeController($this->getRender(),$usuarioModel,$viajeModel);
    }
    public function getChoferController()
    {
        $usuarioModel = $this->getUsuarioModel();
        $viajeModel = $this->getViajeModel();
        $gpsModel = $this->getGpsModel();
        return new ChoferController($this->getRender(),$usuarioModel,$viajeModel,$gpsModel);
    }

    public function getGpsModel()
    {
        $database = $this->getDatabase();
        return new GpsModel($database);
    }
    public function getUsuarioController(){
        $usuarioModel = $this->getUsuarioModel();
        $rolModel = $this->getRolModel();
        $viajeModel = $this->getViajeModel();
        return new UsuarioController($this->getRender(),$usuarioModel,$rolModel,$viajeModel);
    }
    public function getVehiculoModel(){
        $database = $this->getDatabase();
        return new VehiculoModel($database);
    }
    public function getVehiculoController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VehiculoController($this->getRender(),$vehiculoModel);
    }

    public function getClienteModel(){
        $database = $this->getDatabase();
        return new ClienteModel($database);
    }
    public function getClienteController(){
        $clienteModel = $this->getClienteModel();
        return new ClienteController($this->getRender(),$clienteModel);
    }

    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }
}