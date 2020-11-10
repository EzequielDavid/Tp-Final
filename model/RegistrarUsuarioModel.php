<?php


class RegistrarUsuarioModel
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
}