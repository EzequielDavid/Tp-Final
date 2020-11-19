<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");
include_once ("model/UsuarioModel.php");
include_once ("model/VehiculoModel.php");
include_once ("model/RolModel.php");
include_once("Controller/InicioController.php");
include_once ("Controller/UsuarioController.php");
include_once ("Controller/VehiculoController.php");
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



    public function getInicioController(){
        $rolModel = $this->getRolModel();
        return new InicioController($this->getRender(),$rolModel);
    }
    public function getUsuarioModel(){
        $database = $this->getDatabase();
        return new UsuarioModel($database);
    }
    public function getRolModel(){
        $database = $this->getDatabase();
        return new RolModel($database);
    }
    public function getUsuarioController(){
        $usuarioModel = $this->getUsuarioModel();
        $rolModel = $this->getRolModel();
        return new UsuarioController($this->getRender(),$usuarioModel,$rolModel);
    }
    public function getVehiculoModel(){
        $database = $this->getDatabase();
        return new VehiculoModel($database);
    }
    public function getVehiculoController(){
        $vehiculoModel = $this->getVehiculoModel();
        return new VehiculoController($this->getRender(),$vehiculoModel);
    }
    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }
}