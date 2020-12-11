<body>

<!-- Container - Upload -->
<div class="w3-container w3-display-container container-datos-full form-flota" style="width: 90% !important;">
    <div class="w3-card-4 margin-topbottom datos-full">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Actualizar datos del viaje</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Viaje</h5>
            {{#viaje}}

            <div>
                <button class="w3-btn w3-margin w3-teal" onclick="getLocation()">Calcular posición</button>
                <br>
                <p id="enviado"></p>
                <form name="inputform" action="index.php?module=chofer&action=enviarPosicionGps" method="post">
                    <input type="hidden" value="latitud" name="lati" id="la">
                    <input type="hidden" value="longitud" name="longi" id="lo">
                    <input type="hidden" value={{matricula}} name="matricula">
                    <div style="width: 100%; display: flex; justify-content: center; margin-top: 2.5rem;">
                        <button style="display: block !important; visibility: visible !important;" id="botonGps" class="w3-btn w3-margin">Enviar mi posicion actual en GPS
                        </button>
                        <br>
                    </div>
                </form>
            </div>
        </div>
        <form class="w3-container" action="index.php?module=chofer&action=actualizarDatosViaje" method="POST">
            <div class="w3-padding-32">

                <h3 class="w3-text-orange w3-opacity w3-margin-bottom">Generales</h3>

                <div class="w3-row-padding" style="margin-top: 2rem;">
                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Km recorridos</b>
                            <input type="hidden" value={{id_viaje}} name="idViaje">
                            <input type="hidden" value={{matricula}} name="matricula">
                            <input class="w3-input w3-border w3-sand w3-opacity" name="km_recorridos" type="number">
                            <p id="botonGps"></p>

                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Desviación</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="desviacion" type="number">
                    </div>

                </div>
            </div>

            <div class="w3-padding-32">

                <h3 class="w3-text-orange w3-opacity w3-margin-bottom">Combustible</h3>

                <div class="w3-row-padding" style="margin-top: 2rem;">
                       <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Importe</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="combustible" type="number">
                    </div>

                </div>
            </div>

            <div class="w3-padding-32">

                <h3 class="w3-text-orange w3-opacity w3-margin-bottom">Pasajes y peajes</h3>

                <div class="w3-row-padding" style="margin-top: 2rem;">
                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Importe</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="pasajes_peajes" type="number">
                    </div>

                </div>

                <div class="w3-row-padding" style="margin-top: 2rem;">
                    <p class="w3-text-red w3-opacity"><b>Aclaración:</b> la ubicación se guardará automáticamente al finalizar la opeación</p>
                </div>

            </div>

            <div class="w3-panel w3-section" style="display: flex; justify-content: flex-end">
                <input class="w3-btn w3-orange w3-opacity" type="submit" value="Actualizar" id="caluclo" onclick="getLocation()"></p>
            </div>
        </form>
        {{/viaje}}

    </div>
</div>

{{>footer}}