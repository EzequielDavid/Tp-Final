<?php


class EstadisticasController
{
    private $render;
    private $estadisticasModel;

    public function __construct($render, $estadisticasModel)
    {
        $this->render = $render;
        $this->estadisticasModel = $estadisticasModel;

    }


    function mostrarEstadisticas()
    {
        ///// vehiculos/////////////7
        $fueraDeServicio["fueraDeServicio"] = $this->estadisticasModel->vehiculosFueraDeServicio();
        $costos['costos'] = $this->estadisticasModel->gastoTotalMantenimiento();
        $vehiculos['vehiculos'] = $this->estadisticasModel->totalDeVehiculos();
        $vehiculosDisponibles['vehiculosDisponibles'] = $this->estadisticasModel->totalVehiculosDisponibles();
        $vehiculosOcupados['vehiculosOcupados'] = $this->estadisticasModel->totalVehiculosOcupados();
        //// viajes/////////////////
        $viajesEnCurso['viajesEnCurso'] = $this->estadisticasModel->totalViajesEnCurso();
        $viajes["viajes"] = $this->estadisticasModel->totalViajesRealizados();
        $kilometros['kilometros'] = $this->estadisticasModel->totalKilometrosRecorridos();
        $viajesPendientes['viajesPendientes'] = $this->estadisticasModel->totalViajesPendientes();
        ///////// arrastres///////////////////
        $arrastres['arrastres'] = $this->estadisticasModel->totalDeArrastres();
        $arrastresDisponibles['arrastresDisponibles'] = $this->estadisticasModel->totalArrastresDisponibles();
        $arrastresOcupados['arrastresOcupados'] = $this->estadisticasModel->totalArrastresOcupados();


        $datosEstadisticos['datos'] = array('fueraDeServicio' => $fueraDeServicio['fueraDeServicio']['total'], 'viajes' => $viajes['viajes']['total'], 'kilometros' => $kilometros['kilometros']['total'], 'costos' => $costos['costos']['total'], 'vehiculos' => $vehiculos['vehiculos']['total'], 'arrastres' => $arrastres['arrastres']['total'], 'arrastresOcupados' => $arrastresOcupados['arrastresOcupados']['total'], 'arrastresDisponibles' => $arrastresDisponibles['arrastresDisponibles']['total'], 'vehiculosOcupados' => $vehiculosOcupados['vehiculosOcupados']['total'], 'vehiculosDisponibles' => $vehiculosDisponibles['vehiculosDisponibles']['total'], 'viajesEnCurso' => $viajesEnCurso['viajesEnCurso']['total'], 'viajesPendientes' => $viajesPendientes['viajesPendientes']['total']);


        echo $this->render->render("view/partial/headerAdministrador.mustache", $_SESSION),
        $this->render->render("view/mostrarEstadisticas.php", $datosEstadisticos);

    }
}