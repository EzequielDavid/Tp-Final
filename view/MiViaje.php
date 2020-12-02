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
        <div class="w3-col s6 w3-dark-grey w3-opacity w3-center">
            {{#viaje}}
            <b>{{0}}</b><br>
            <b>{{1}} </b><br>
            <b>{{2}} </b><br>
            {{/viaje}}
        </div>
        <div class="w3-col s12 w3-dark-grey w3-opacity w3-center">
            <div class="w3-container w3-orange w3-margin">
                <button class="w3-btn w3-padding">Enviar mi posicion actual en GPS</button><br>
            </div>
            <div class="w3-container w3-orange w3-margin">
                <button class="w3-btn w3-padding">Combustible</button>
            </div>
        </div>
    </div>
</div>
</body>