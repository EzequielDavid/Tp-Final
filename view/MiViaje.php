<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="img/nova.png" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>
<body>
<div class="w3-card-4" >
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
        <div id="map"></div>
        <div class="w3-col s12 w3-dark-grey w3-opacity w3-center">
            <div class="w3-container w3-orange w3-margin">
                <button id="caluclo" class="w3-btn w3-margin w3-red" onclick="getLocation()">Calcular posicion</button><br>
                <p id="enviado"></p>
                <form name="inputform" action="index.php?module=chofer&action=enviarPosicionGps" method="post">
                    <input type="hidden" value="latitud" name="lati" id="la">
                    <input type="hidden" value="longitud" name="longi" id="lo">
                    <input type="hidden" value={{matricula}} name="matricula">
                    <button id="botonGps" class="w3-btn w3-padding w3-disabled" >Enviar mi posicion actual en GPS</button><br>
                </form>
            </div>
            <div class="w3-container w3-orange w3-margin">
                <form name="inputform" action="index.php?module=chofer&action=actualizarGastoCombustible" method="post">
                <input class="w3-margin" type="number" name="combustible">
                    <input type="hidden" value={{id_viaje}} name="idViaje">
                <button class="w3-btn w3-red w3-margin">Cargar gasto de Combustible</button>
                </form>
            </div>
            <div class="w3-container w3-orange w3-margin">
                <form name="inputform" action="index.php?module=chofer&action=actualizarGastoPeaje" method="post">
                    <input class="w3-margin" type="number" name="peaje">
                    <input type="hidden" value={{id_viaje}} name="idViaje">
                    <button class="w3-btn w3-red w3-margin">Cargar gasto de Peaje</button>
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