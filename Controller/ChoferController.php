<?php


class ChoferController
{
    private $render;
    private $usuarioModel;
    private $viajeModel;
    private $vehiculoModel;

    public function __construct($render, $usuarioModel, $viajeModel, $vehiculoModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
        $this->viajeModel = $viajeModel;
        $this->vehiculoModel = $vehiculoModel;
    }

    public function mostrarViaje()
    {
        $viaje["viaje"] = $this->mostrarViajesDeChofer();
        $this->renderTo("MiViaje.php", $viaje);
    }

    public function enviarPosicionGps()
    {
        $viaje["viaje"] = $this->mostrarViajesDeChofer();
        $this->viajeModel->actualizarPosicionActual($_POST["matricula"], $_POST["lati"], $_POST["longi"]);

        if ($viaje["viaje"]["latitud"] == 0 && $viaje["viaje"]["longitud"] == 0) {
            $this->viajeModel->actualizarEstadoAEnViaje($viaje["viaje"]["id_viaje"]);

        }
    }

    public function actualizarGastoCombustible()
    {
        $combustible = $this->viajeModel->buscarValorCombustiblePorIdViajes($_POST["idViaje"]);

        $total = $combustible["combustible"] + $_POST["combustible"];
        $this->viajeModel->actualizarDatosDeCombustible($total, $_POST["idViaje"]);

        $this->mostrarViaje();
    }

    public function actualizarGastoPeaje()
    {
        $peaje = $this->viajeModel->buscarValorPeajePorIdViajes($_POST["idViaje"]);

        $total = $peaje["pasajes_peajes"] + $_POST["peaje"];
        $this->viajeModel->actualizarDatosDePeaje($total, $_POST["idViaje"]);

        $this->mostrarViaje();
    }

    public function finalizarViaje()
    {
        $viaje["viaje"] = $this->mostrarViajesDeChofer();
        $this->viajeModel->actualizarEstadoViajeAFinalizado($viaje["viaje"]["id_viaje"]);
        $this->vehiculoModel->asignarEstadoVehiculo("Disponible", $_POST["matricula"]);

        $this->mostrarViaje();
    }

    public function actualizarDatosViaje()
    {
        $valoresAEditar = ["km_recorridos", "desviacion", "combustible", "pasajes_peajes"];
        $this->actualizarDatosDe($valoresAEditar);
        $this->actualizarPosicion();
        $this->enviarPosicionGps();

        $this->renderTo("Inicio.php", "");
    }

    public function renderTo($view, $viaje)
    {
        echo $this->render->render("view/partial/headerChofer.mustache", $_SESSION),
        $this->render->render("view/$view", $viaje);
    }

    public function mostrarViajesDeChofer()
    {
        return $this->viajeModel->mostrarViaje($_SESSION["dni"]);
    }

    public function sumarEntre($contenedorValor, $valor)
    {
        return $contenedorValor["$valor"] + $_POST["$valor"];
    }

    public function actualizarDatosDe($valoresAEditar)
    {
        for ($i = 0; $i < sizeof($valoresAEditar); $i++) {

            if ($_POST["$valoresAEditar[$i]"] != null) {
                $contenedorValor = $this->viajeModel->buscarValor("$valoresAEditar[$i]");
                $total = $this->sumarEntre($contenedorValor, "$valoresAEditar[$i]");
                $this->viajeModel->actualizarDatosDe("$valoresAEditar[$i]", $total);
            }
        }

        if ($_POST["km_recorridos"] != null) {
            $contenedorValor = $this->vehiculoModel->buscarValorDe("km_recorridos");
            $total = $this->sumarEntre($contenedorValor, "km_recorridos");
            $this->vehiculoModel->actualizarDatosDe("km_recorridos", $total);
        }
    }

    public function actualizarPosicion()
    {
        $viaje["viaje"] = $this->mostrarViajesDeChofer();

        $this->viajeModel->actualizarPosicionActual($_POST["matricula"], $_POST["lati"], $_POST["longi"]);
        if ($viaje["viaje"]["latitud"] == 0 && $viaje["viaje"]["longitud"] == 0)
            $this->viajeModel->actualizarEstadoAEnViaje($viaje["viaje"]["id_viaje"]);
    }

    public function mostrarFormulario()
    {
        $viaje["viaje"] = $this->mostrarViajesDeChofer();
        $this->renderTo("ActualizarViaje.php", $viaje);
    }
}