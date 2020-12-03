<?php


class ClienteModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function buscarCliente($cuit){
        $c = $this->database->prepare("SELECT * FROM cliente WHERE cuit LIKE ?");
        $c->bind_param("i", $cuit);
        $c->execute();
        $cliente = $c->get_result();
        return $cliente->fetch_assoc();
    }

    public function registrarCliente($denominacion, $cuit, $direccion, $telefono, $email, $contacto1, $contacto2){

        $c = $this->database->prepare("INSERT INTO `cliente`(`denominacion`, `cuit`, `direccion`, `telefono`, `email`, `contacto1`, `contacto2`) VALUES (?,?,?,?,?,?,?)");
        $c->bind_param("sisisss", $denominacion, $cuit, $direccion, $telefono, $email, $contacto1, $contacto2);
        $c->execute();
    }

}