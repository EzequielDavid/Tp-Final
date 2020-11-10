<?php


class RegistrarUsuarioController
{
    private $render;
    private $registrarUsuarioModel;
    public function __construct($render,$registrarUsuarioModel)
    {
        $this->render = $render;
        $this->registrarUsuarioModel = $registrarUsuarioModel;
    }

    public function execute()
    {
        echo $this->render->render("view/RegistrarUsuario.php");
    }
    public function procesarRegistroUsuario(){
        $dni = $_POST["dni"];
        $name = $_POST["name"];
        $surname  = $_POST["surname"];
        $email  = $_POST["email"];
        $password = md5($_POST["password"]);
        $this->registrarUsuarioModel->registrarUsuario($dni,$name,$surname,$email,$password);
        header('Location: index.php?module=inicio&action=execute');
        die();
    }
}