<body>
<style>
    .posicion {
        visibility: hidden;
        display: none;
    }

    .btn-red {
        background-color: #f44336 !important;
    }

    .btn-green {
        background-color: #4CAF50 !important;

    }

    .hide-content {
        display: none;
        visibility: hidden;
    }

    .display-right {
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }
</style>
<!-- Container - Upload -->
<div class="w3-container w3-display-container container-datos-full form-flota" style="width: 90% !important;">
    <div class="w3-card-4 margin-topbottom datos-full">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Actualizar datos del viaje</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Viaje</h5>
        </div>

        {{#viaje}}
        <form class="w3-container" action="index.php?module=chofer&action=actualizarDatosViaje" method="POST">

            <div class="w3-padding-32">

                <div class="w3-row-padding" style="margin-top: 2rem;">
                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Km recorridos</b>
                            <input type="hidden" value={{id_viaje}} name="idViaje">
                            <input type="hidden" value={{matricula}} name="matricula">
                            <input class="w3-input w3-border w3-sand w3-opacity" name="km_recorridos" type="number">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Desviación</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="desviacion" type="number">
                    </div>

                </div>
            </div>

            <div class="w3-padding-32">

                <div class="w3-row-padding" style="margin-top: 2rem;">
                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Combustible</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="combustible" type="number"
                               placeholder="Importe del combustible">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Pasajes y peaje</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="pasajes_peajes" type="number"
                               placeholder="Importe de los pasajes y/o peajes">
                    </div>

                    <p class="w3-half w3-text-red w3-opacity w3-section"><b>Aclaración:</b> la ubicación se guardará automáticamente al
                        finalizar la opeación</p>
                </div>

            </div>


            <div class="display-right w3-section">
                <button onclick="actualizar();" type="button" class="w3-button w3-orange">Actualizar</button>

                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                            <span onclick="document.getElementById('id01').style.display='none'"
                                  class="w3-button w3-display-topright">&times;</span>
                            <h4 class="w3-center w3-section" style="margin-top: 2rem !important;"><b>¿Desea actualizar
                                    los datos?</b></h4>
                            <h6 class="w3-center w3-section" style="margin-top: 2rem !important;">Se actualizarán todos
                                los datos relacionados al viaje y vehículo</h6>

                            <p id="enviado" class="hide-content"></p>
                            <p id="caluclo" class="hide-content" style="display: none;"></p>
                            <p id="map" class="hide-content"></p>
                            <div class="w3-panel w3-section"
                                 style="display: flex; justify-content: flex-end; margin-top: 10rem !important;">
                                <input class="w3-btn btn-red" type="button" value="Cancelar"
                                       onclick="document.getElementById('id01').style.display='none'"
                                       style="margin-right: 1rem;"></p>

                                <input type="hidden" value="latitud" name="lati" id="la">
                                <input type="hidden" value="longitud" name="longi" id="lo">
                                <input type="hidden" value={{matricula}} name="matricula">

                                <input class="w3-btn btn-green" type="submit" style="background: green !important;"
                                       value="Confirmar" id="botonGps"></p>
                            </div>
                        </div>
                    </div>


                    <script>
                        function actualizar() {
                            getLocation();
                            document.getElementById('id01').style.display = 'block';
                        }
                    </script>


                </div>
            </div>
        </form>
        {{/viaje}}
    </div>
</div>

{{>footer}}