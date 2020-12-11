<header class="w3-display-container w3-wide header-nova" style="width: 100% !important;" id="home">
    <img class="w3-image img-nova" src="img/slide_chofer.png" style="width: 100% !important;" alt="Architecture"
         width="100%" height="100%">
</header>
<body>
<div class="w3-card-4 card-contenedor">
    <div class="w3-row w3-dark-grey w3-margin-top">
        <div class="w3-col s6 w3-amber w3-opacity w3-center">
            <b>Viaje N°:</b><br>
            <b>Destino: </b><br>
            <b>Estado: </b><br>
        </div>
        {{#viaje}}
        <div class="w3-col s6 w3-dark-grey w3-opacity w3-center">
            <b>{{id_viaje}}</b><br>
            <b>{{destino}} </b><br>
            <b>{{estado}} </b><br>
        </div>
        <div id="map"></div>z
        <div class="w3-col s12 w3-dark-grey w3-opacity w3-center">
            <div class="w3-container w3-orange w3-margin">
                <h5 class=" w3-opacity"><b>Descargar archivo con datos sobre el viaje</b></h5>

                <form action="index.php?module=chofer&action=enviarPosicionGps" method="post">
                <button class="w3-btn w3-black w3-margin">Descargar PDF</button>
                </form>
            </div>

            <div class="w3-container w3-orange w3-margin">
                <button id="caluclo" class="w3-btn w3-margin w3-red" onclick="getLocation()">Calcular posición</button>
                <br>
                <p id="enviado"></p>
                <form name="inputform" action="index.php?module=chofer&action=enviarPosicionGps" method="post">
                    <input type="hidden" value="latitud" name="lati" id="la">
                    <input type="hidden" value="longitud" name="longi" id="lo">
                    <input type="hidden" value={{matricula}} name="matricula">
                    <div style="width: 100%; display: flex; justify-content: center; margin-top: 2.5rem;">
                        <button id="botonGps" class="w3-btn w3-margin w3-disabled">Enviar mi posicion actual en GPS
                        </button>
                        <br>
                    </div>
                </form>
            </div>

            <div class="w3-container w3-orange w3-margin">
                <form name="inputform" action="index.php?module=chofer&action=actualizarGastoCombustible" method="post">
                    <h4 class=" w3-opacity"><b>Combustible</b></h4>
                    <input class="w3-margin" type="number" name="combustible">
                    <input type="hidden" value={{id_viaje}} name="idViaje">
                    <button class="w3-btn w3-black w3-margin">Cargar gasto</button>
                </form>
            </div>
            <div class="w3-container w3-orange w3-margin">
                <form name="inputform" action="index.php?module=chofer&action=actualizarGastoPeaje" method="post">
                    <h4 class=" w3-opacity"><b>Peaje</b></h4>
                    <input class="w3-margin" type="number" name="peaje">
                    <input type="hidden" value={{id_viaje}} name="idViaje">
                    <button class="w3-btn w3-black w3-margin">Cargar gasto</button>
                </form>
            </div>
            <div class="w3-container w3-orange w3-margin">
                <form name="inputform" action="index.php?module=chofer&action=finalizarViaje" method="post">
                    <button class="w3-btn w3-red w3-margin">Finalizar Viaje</button>
                </form>
            </div>
        </div>
        {{/viaje}}
    </div>
</div>
</body>
