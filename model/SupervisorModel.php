<?php

class SupervisorModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }


    public function guardarCarga($tipo_carga, $peso_neto, $hazard, $imo_class, $reefer, $temperatura)
    {
        $c=$this->database->prepare("INSERT INTO `carga`(`tipo`, `peso_neto`, `hazard`, `imo_class`, `reefer`, `temperatura`) VALUES (?,?,?,?,?,?)");
        $c->bind_param("sissss",$tipo_carga, $peso_neto, $hazard, $imo_class, $reefer, $temperatura);
        $c->execute();
    }

    public function guardarDatosEstimados($est_etd, $est_eta, $est_kilometros, $est_combustible, $est_hazard, $est_reefer, $viaticos, $peajes_pasajes, $extras, $fee)
    {
        $viaje_codigo= 1;
        $c=$this->database->prepare("INSERT INTO `viaje_estimado`(`etd`, `eta`, `kilometros`, `combustible`, `hazard`, `reefer`,`viaticos`, `pasajes_peajes`, `extras`,  `fee`, `viaje_codigo`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $c->bind_param("ssiissiiiii",$est_etd, $est_eta, $est_kilometros, $est_combustible, $est_hazard, $est_reefer, $viaticos, $peajes_pasajes, $extras, $fee, $viaje_codigo);
        $c->execute();
    }

    public function obtenerUltimoIdIngresado($nombreTabla, $id){

        //

    }

}