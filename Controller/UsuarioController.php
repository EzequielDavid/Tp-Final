<?php


class UsuarioController
{
    private $render;
    private $usuarioModel;
    private $rolModel;

    public function __construct($render, $usuarioModel, $rolModel)
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
        $usuarios["usuarios"]= $this->usuarioModel->listarUsuarios();
        //  die($usuarios["usuarios"]);
        echo $this->render->render("view/partial/headerAdministrador.mustache",$_SESSION),
        $this->render->render("view/ListadoDeUsuarios.php",$usuarios);

    }

    public function asignarRolUsuario()
    {
        $this->usuarioModel->asginarRolUsuario($_POST["dni"], $_POST["rol"]);
        $data["usuarios"] = $this->usuarioModel->listarUsuarios();
        $this->rederHeaderYUsuario($data);
    }

    public function procesarRegistroUsuario()
    {
        $usuarioAdmin = $this->usuarioModel->buscarUsuarioAdmin();
        while ($usuarioAdmin == null)
            $this->guardarDatosNuevoUsuarioAdm();

        $this->guardarDatosNuevoUsuario();
    }

    public function borrarUsuario()
    {
        $this->usuarioModel->borrarUsuario($_POST["dni"]);
        $this->listarUsuario();
    }

    public function login()
    {
        $name = $_POST["name"];
        $pasword = $_POST["pasword"];

        $usuario = $this->usuarioModel->buscarUsuario($name, $pasword);

        $this->redirectLoginUsuario($usuario, $name, $pasword);
    }

    public function direccionarSegunRol($idRol, $session)
    {
        $rol = $this->rolModel->buscarRolNombre($idRol)["rol"];

        echo $this->render->render("view/partial/header" . ucfirst($rol) . ".mustache", $session),
        $this->render->render("view/Inicio.php", $_SESSION);

       /* $rol= $this->rolModel->buscarRolNombre($idRol);
        $rolNombre = $rol["rol"];
        if($rolNombre == "chofer")
        {
            $viaje["viaje"]=$this->viajeModel->mostrarViaje( $_SESSION["dni"]);
            echo $this->render->render("view/partial/header".ucfirst($rolNombre).".mustache",$session),
            $this->render->render("view/MiViaje.php",$viaje);
        }
        else
        {
            echo $this->render->render("view/partial/header".ucfirst($rolNombre).".mustache",$session),
            $this->render->render("view/Inicio.php",$_SESSION);
        }*/
    }

    public function bloquearUsuario()
    {
        $this->usuarioModel->bloquearUsuario($_POST["dni"]);
        $this->listarUsuario();
    }

    public function logout()
    {
        session_destroy();
        echo $this->render->render("view/partial/header.mustache"),
        $this->render->render("view/inicio.php");
    }

    public function redirectLoginUsuario($usuario, $name, $pasword)
    {
        if ($usuario == null)
            die($this->render->render("view/AvisoRegistrarse.php", $name));

        else if ($usuario["id_rol"] == 0)
            die($this->render->render("view/AvisoEsperarRol.php", $name));

        else if ($usuario["nombre"] == $name && $usuario["pasword"] == $pasword && $usuario["id_rol"] != null) {
            $_SESSION["rol"] = $usuario["id_rol"];
            $_SESSION["name"] = $usuario["nombre"];

            // le saqué que se pase la contraseña, no le encontré una función pero por las dudas lo comento :)
            // $_SESSION["pasword"]=$usuario["pasword"];
            $this->direccionarSegunRol($usuario["id_rol"], $_SESSION);
        }
    }

    public function guardarDatosNuevoUsuarioAdm()
    {
        $dni = $_POST["dni"];
        $licencia= $_POST["licencia"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $nacimiento = $_POST["nacimiento"];
        $matricula= $_POST["matricula"];
        $this->usuarioModel->registrarUsuario($dni, $name, $surname, $email, $password,$licencia,$nacimiento, 1, $matricula);
        header('Location: index.php?module=inicio&action=execute');
        die();
    }

    public function guardarDatosNuevoUsuario()
    {
        $dni = $_POST["dni"];
        $licencia = $_POST["licencia"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $nacimiento = $_POST["nacimiento"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $rol = $_POST["rol"];
        $this->usuarioModel->registrarUsuario($dni, $name, $surname,$email, $password,$licencia,$nacimiento, 0, "ninguna");
        header('Location: index.php?module=inicio&action=execute');
        die();
    }

    /**
     * @param $data
     */
    public function rederHeaderYUsuario($data)
    {
        $this->usuarioModel->listarUsuarios();
        echo $this->render->render("view/partial/headerAdministrador.mustache", $_SESSION),
        $this->render->render("view/ListadoDeUsuarios.php", $data);
    }
}