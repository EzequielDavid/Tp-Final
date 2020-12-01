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
            <b>Km Recorridos:</b>
        </div>
        <div class="w3-col s6 w3-dark-grey w3-opacity w3-center">
            {{#viaje}}
            <b>{{0}}</b><br>
            <b>{{1}} </b><br>
            <b>{{2}} </b><br>
            <b>{{3}} km</b><br>
            {{/viaje}}
        </div>
        <div class="w3-col s12 w3-dark-grey w3-opacity w3-center">
        <img src="view/qrcode.php?latitud=1&longitud=2">
        </div>
    </div>
</div>
</div>

</body>
