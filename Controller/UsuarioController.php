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
        $usuarios["usuarios"] = $this->usuarioModel->listarUsuarios();
        //  die($usuarios["usuarios"]);
        echo $this->render->render("view/partial/headerAdministrador.mustache", $_SESSION),
        $this->render->render("view/ListadoDeUsuarios.php", $usuarios);

    }

    public function listarBackupUsuario()
    {
        $usuarios["usuarios"] = $this->usuarioModel->listarBackupUsuario();
        $this->rederHeaderYUsuario($usuarios);
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

    public function direccionarSegunRol()
    {

        if ($_SESSION["rol"] != null) {

            $rol = $this->rolModel->buscarRolNombre($_SESSION["rol"]);
            if ($rol["rol"] == "chofer") {
                echo $this->render->render("view/partial/header" . ucfirst($rol["rol"]) . ".mustache", $_SESSION),
                $this->render->render("view/Miviaje.php", $_SESSION);
            } else {
                echo $this->render->render("view/partial/header" .ucfirst($rol["rol"]) . ".mustache", $_SESSION),
                $this->render->render("view/Inicio.php", $_SESSION);
            }

        } else {
            $_SESSION["rol"] = "";
            echo $this->render->render("view/partial/header.mustache", $_SESSION["rol"]),
            $this->render->render("view/Inicio.php", $_SESSION["rol"]);

        }

    }

    public function logout()
    {
        session_destroy();
        echo $this->render->render("view/partial/header.mustache"),
        $this->render->render("view/inicio.php");
    }

    public function redirectLoginUsuario($usuario, $name, $pasword)
    {
        if ($usuario == null){
            $datos = $this->datosError("¡Espera!", "Para ingresar primero debes registrarte");
            echo $this->render->render("view/partial/header.mustache"),
            $this->render->render("view/AvisoEsperar.php", $datos);
        }
        else if ($usuario["id_rol"] == 0) {
            $datos = $this->datosError("Solo queda esperar", "Cuando te asignen un rol podrás ingresar a la página");
            echo $this->render->render("view/partial/header.mustache"),
            $this->render->render("view/AvisoEsperar.php", $datos);
        } else if ($usuario["nombre"] == $name && $usuario["pasword"] == $pasword && $usuario["id_rol"] != null) {
            $_SESSION["rol"] = $usuario["id_rol"];
            $_SESSION["name"] = $usuario["nombre"];
            $_SESSION["dni"] = $usuario["dni"];

            $this->direccionarSegunRol();
        }
    }

    public function guardarDatosNuevoUsuarioAdm()
    {
        $dni = $_POST["dni"];
        $licencia = $_POST["licencia"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $nacimiento = $_POST["nacimiento"];
        $matricula = $_POST["matricula"];
        $this->usuarioModel->registrarUsuario($dni, $name, $surname, $email, $password, $licencia, $nacimiento, 1, $matricula);
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
        $this->usuarioModel->registrarUsuario($dni, $name, $surname, $email, $password, $licencia, $nacimiento, 0, "ninguna");
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

    /**
     * @param $usuarios
     * @return mixed
     */
    public function datosError($cabecera, $mensaje)
    {
        $datos["datos"] = array(
            array($cabecera, $mensaje)
        );
        return $datos;
    }
}