<?php


class UsuarioModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
    public function registrarUsuario($dni,$licencia,$name,$surname,$nacimiento,$email,$password,$rol)
    {

        $c=$this->database->prepare("INSERT INTO usuario ( dni, licencia_conduccion, nombre, apellido, fecha_nac, email, pasword, id_rol) VALUES (?,?,?,?,?,?,?,?)");
        $c->bind_param("iisssssi",$dni,$licencia,$name,$surname,$nacimiento,$email,$password,$rol);
        $c->execute();
        header("Location: index.php?module=inicio&action=execute");
    }
    public function buscarUsuarioAdmin(){
        $c=$this->database->prepare("SELECT * FROM usuario WHERE id_rol LIKE 1");
      //  $c->bind_param("i",1);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();
    }
    public function buscarUsuario($name,$pasword)
    {
        $c=$this->database->prepare("SELECT * FROM usuario WHERE nombre LIKE ? and pasword LIKE ?");
        $c->bind_param("ss",$name,$pasword);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();
    }

    public function listarUsuarios()
    {
        $c=$this->database->prepare("SELECT usuario.dni, usuario.nombre, usuario.apellido, usuario.licencia_conduccion , rol.rol from usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE usuario.id_rol NOT LIKE 1");
      //  $c->bind_param("ss",$name,$pasword);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();
    }

    public function asginarRolUsuario($dni,$rol)
    {
        $c=$this->database->prepare("UPDATE usuario SET id_rol = ? WHERE dni = ?");
        $c->bind_param("ii", $rol,$dni);
        $c->execute();
    }
}