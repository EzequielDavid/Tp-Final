<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");
include_once ("model/RegistrarUsuarioModel.php");
include_once("Controller/InicioController.php");
include_once ("Controller/RegistrarUsuarioController.php");

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
        return new InicioController($this->getRender());
    }
    public function getRegistrarUsuarioModel(){
        $database = $this->getDatabase();
        return new RegistrarUsuarioModel($database);
    }
    public function getRegistrarUsuarioController(){
        $registrarUsuarioModel = $this->getRegistrarUsuarioModel();
        return new RegistrarUsuarioController($this->getRender(),$registrarUsuarioModel);
    }

    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }
}