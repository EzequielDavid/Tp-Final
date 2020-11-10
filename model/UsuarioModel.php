<?php


class UsuarioModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
    public function registrarUsuario($dni,$name,$surname,$email,$password)
    {

        $c=$this->database->prepare("INSERT INTO usuario ( dni, nombre, apellido, email, pasword) VALUES (?,?,?,?,?)");
        $c->bind_param("issss",$dni,$name,$surname,$email,$password);
        $c->execute();
        header("Location: index.php?module=inicio&action=execute");
    }
    public function buscarUsuario($name,$pasword)
    {
        $c=$this->database->prepare("SELECT * FROM usuario WHERE nombre LIKE ? and pasword LIKE ?");
        $c->bind_param("ss",$name,$pasword);
        $c->execute();
        $usuario = $c->get_result();
        return $usuario->fetch_assoc();
    }
}