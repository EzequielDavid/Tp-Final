<?php


class UsuarioController
{
    private $render;
    private $usuarioModel;
    public function __construct($render,$usuarioModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
    }

    public function registrarUsuario()
    {
        echo $this->render->render("view/RegistrarUsuario.php");
    }
    public function procesarRegistroUsuario(){
        $dni = $_POST["dni"];
        $name = $_POST["name"];
        $surname  = $_POST["surname"];
        $email  = $_POST["email"];
        $password = $_POST["password"];
        $this->usuarioModel->registrarUsuario($dni,$name,$surname,$email,$password);
        header('Location: index.php?module=inicio&action=execute');
        die();
    }
    public function login(){
        $name =$_POST["name"];
        $pasword=$_POST["pasword"];
        $usuario = $this->usuarioModel->buscarUsuario($name,$pasword);
        if($usuario == null)
        {
            die("usuario vacio");
        }
        if($usuario["nombre"] == $name && $usuario["pasword"] == $pasword)
        {
            $_SESSION["name"]=$usuario["nombre"];
            $_SESSION["pasword"]=$usuario["pasword"];
          //  $this->render->render("view/partial/header.mustache",$_SESSION);
            echo  $this->render->render("view/partial/header.mustache",$_SESSION),
            $this->render->render("view/inicio.php");
        }
    }
    public function logout()
    {

        session_destroy();
        echo  $this->render->render("view/partial/header.mustache"),
        $this->render->render("view/inicio.php");
    }
}