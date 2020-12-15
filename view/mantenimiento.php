<header class="w3-display-container w3-wide header-nova" style="width: 100% !important;" id="home">
    <img class="w3-image img-nova" src="img/slide_encargado.png" style="width: 100% !important;" alt="Architecture"
         width="100%" height="100%">
</header>
<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list">
    <div class="w3-container w3-orange w3-opacity w3-hide-small w3-margin w3-padding container-list-sm">
        <h2>Service</h2>
        {{#vehiculo}}
        <div class="w3-container">
            <div class="w3-quarter w3-margin-lefth">
                <h3>Matriula:</h3>
            </div>
            <div class="w3-rest">
                <h3>{{matricula}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Modelo:</h3>
            </div>
            <div class="w3-rest">
                <h3>{{modelo}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Marca:</h3>
            </div>
            <div class="w3-rest">
                <h3>{{marca}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Ultimo Service:</h3>
            </div>
            <div class="w3-rest">
                <h3>{{ultimo_service}} </h3>
            </div>
        </div>
    </div>
    <div class="w3-container w3-black">
        <form class="w3-container " action="index.php?module=encargadoDeTaller&action=guardarMantenimiento" method="post">
            <p>
                <label class="w3-text-orange w3-opacity"><b>Fecha</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity" name="fechaMantenimiento" type="date" required=""></p>
            <p>
                <label class="w3-text-orange w3-opacity"><b>Detalle Service</b></label>
                <textarea class="w3-input w3-border w3-sand w3-opacity" name="detalleService" placeholder="Descripción del service" required=""></textarea></p>
            <p>
                <label class="w3-text-orange w3-opacity"><b>Costo Total:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity" type="number" name="costo" required=""></p>
            <p>
                <input type="hidden" name="matricula" value="{{0}}">
                <button class="w3-btn w3-orange w3-opacity">Guardar</button></p>
        </form>
        {{/vehiculo}}
    </div>
</div>
</body>