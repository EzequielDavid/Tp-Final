<?php


class UsuarioController
{
    private $render;
    private $usuarioModel;
    private $rolModel;
    public function __construct($render,$usuarioModel,$rolModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
        $this->rolModel = $rolModel;
    }

    public function registrarUsuario()
    {
        echo $this->render->render("view/RegistrarUsuario.php");
    }


    public function listarUsuario()
    {

        $usuarios["usuarios"]=$this->usuarioModel->listarUsuarios();
      //  die($usuarios["usuarios"]);
        echo $this->render->render("view/partial/headerAdministrador.mustache",$_SESSION),
        $this->render->render("view/ListadoDeUsuarios.php",$usuarios),
        print_r($usuarios);

    }
    public function asignarRolUsuario()
    {
        $dni = $_POST["dni"];
        $rol = $_POST["rol"];
        $this->usuarioModel->asginarRolUsuario($dni,$rol);
        $data["usuarios"]=$this->usuarioModel->listarUsuarios();
        echo $this->render->render("view/partial/headerAdministrador.mustache",$_SESSION),
        $this->render->render("view/ListadoDeUsuarios.php",$data);
    }
    public function procesarRegistroUsuario(){
        $usuarioAdmin = $this->usuarioModel->buscarUsuarioAdmin();
        while ($usuarioAdmin == null)
        {
            $dni = $_POST["dni"];
            $name = $_POST["name"];
            $surname  = $_POST["surname"];
            $email  = $_POST["email"];
            $password = $_POST["password"];
            $this->usuarioModel->registrarUsuario($dni,$name,$surname,$email,$password,1);
            header('Location: index.php?module=inicio&action=execute');
            die();
        }
        $dni = $_POST["dni"];
        $licencia = $_POST["licencia"];
        $name = $_POST["name"];
        $surname  = $_POST["surname"];
        $nacimiento = $_POST["nacimiento"];
        $email  = $_POST["email"];
        $password = $_POST["password"];
        $rol = $_POST["rol"];
        $this->usuarioModel->registrarUsuario($dni,$licencia,$name,$surname,$nacimiento,$email,$password,0,"ninguna");
        header('Location: index.php?module=inicio&action=execute');
        die();
    }
    public function borrarUsuario()
    {
        $dni = $_POST["dni"];
        $this->usuarioModel->borrarUsuario($dni);
        $usuarios["usuarios"]=$this->usuarioModel->listarUsuarios();
        echo $this->render->render("view/partial/headerAdministrador.mustache",$_SESSION),
        $this->render->render("view/ListadoDeUsuarios.php",$usuarios),
        print_r($usuarios);

    }
    public function login(){
        $name = $_POST["name"];
        $pasword=$_POST["pasword"];
        $usuario = $this->usuarioModel->buscarUsuario($name,$pasword);
        if($usuario == null)
        {
            die("usuario vacio");
        }

        if($usuario["nombre"] == $name && $usuario["pasword"] == $pasword && $usuario["id_rol"] != null)
        {

            $_SESSION["rol"] = $usuario["id_rol"];
            $_SESSION["name"]=$usuario["nombre"];
            $_SESSION["pasword"]=$usuario["pasword"];
          $this->direccionarSegunRol($usuario["id_rol"],$_SESSION);
        }
    }
    public function direccionarSegunRol($idRol,$session)
    {
        $rol= $this->rolModel->buscarRolNombre($idRol);
        $rolNombre = $rol["rol"];
        echo $this->render->render("view/partial/header".ucfirst($rolNombre).".mustache",$session),
        $this->render->render("view/Inicio.php",$_SESSION);
    }
    public function logout()
    {

        session_destroy();
        echo  $this->render->render("view/partial/header.mustache"),
        $this->render->render("view/inicio.php");
    }
}