<?php


class RolModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function buscarRolNombre($idRol){
        $c=$this->database->prepare("SELECT * FROM rol WHERE id_rol LIKE ?");
        $c->bind_param("i",$idRol);
        $c->execute();
        $rol = $c->get_result();
        return $rol->fetch_assoc();
    }
}