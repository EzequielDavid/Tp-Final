<?php


class UsuarioModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarUsuario($dni, $name, $surname, $email, $password, $licencia = false, $nacimiento, $rol, $matricula = false)
    {
        if ($licencia == false) {
            $licencia = null;
        }

        $c = $this->database->prepare("INSERT INTO usuario ( dni, nombre, apellido, email, pasword,licencia_conduccion,fecha_nac, id_rol, matricula) VALUES (?,?,?,?,?,?,?,?,?)");
        $c->bind_param("issssisis", $dni, $name, $surname, $email, $password, $licencia, $nacimiento, $rol, $matricula);
        $c->execute();
        header("Location: index.php?module=inicio&action=execute");
    }

    public function buscarUsuarioAdmin()
    {
        $c = $this->database->prepare("SELECT * FROM usuario WHERE id_rol LIKE 1");
        //  $c->bind_param("i",1);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();
    }

    public function buscarUsuario($name, $pasword)
    {

        $c = $this->database->prepare("SELECT * FROM usuario WHERE nombre LIKE ? and pasword LIKE ?");
        $c->bind_param("ss", $name, $pasword);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();
    }

    public function buscarUsuarioPorDni($dni)
    {
        $c = $this->database->prepare("SELECT * FROM usuario WHERE dni LIKE ?");
        $c->bind_param("i", $dni);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();
    }

    public function listarUsuarios()
    {
        $c = $this->database->prepare("SELECT usuario.dni, usuario.nombre, usuario.apellido, usuario.licencia_conduccion , rol.rol from usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE usuario.id_rol NOT LIKE 1");
        //  $c->bind_param("ss",$name,$pasword);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_all();
    }

    public function listarChoferes()
    {
        $c = $this->database->prepare("SELECT usuario.dni,usuario.nombre, usuario.apellido, usuario.licencia_conduccion, usuario.matricula , viaje.destino from usuario  
                                        INNER JOIN vehiculo on usuario.matricula = vehiculo.matricula
                                        INNER JOIN viaje on vehiculo.matricula = viaje.matricula
                                        WHERE usuario.id_rol  LIKE 4");
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_all();

    }

    public function borrarUsuario($dni)
    {
        if($this->buscarUsuarioPorDni($dni)!=null)
            $this->borrarUsuarioDeLaTabla("usuario",$dni);

        else
            $this->borrarUsuarioDeLaTabla("usuario_borrado", $dni);
    }

    public function borrarUsuarioDeLaTabla($nombreTabla, $dni)
    {
        $c = $this->database->prepare("DELETE FROM `$nombreTabla` WHERE `$nombreTabla`.`dni` = ?");
        $c->bind_param("i", $dni);
        $c->execute();
    }

    public function asginarRolUsuario($dni, $rol)
    {
        $c = $this->database->prepare("UPDATE usuario SET id_rol = ? WHERE dni = ?");
        $c->bind_param("ii", $rol, $dni);
        $c->execute();
    }

    public function listarBackupUsuario()
    {
        $c = $this->database->prepare("SELECT * FROM `usuario_borrado`");
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_all();
    }

    public function asignarVehiculoAChofer($matricula, $dni)
    {
        $c = $this->database->prepare("UPDATE usuario SET matricula = ? WHERE dni = ?");
        $c->bind_param("si", $matricula, $dni);
        $c->execute();
    }
}
