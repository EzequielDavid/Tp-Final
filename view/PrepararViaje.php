<div class="w3-container w3-display-container">
    <img src="img/.jpg" class="responsive w3-circle" id="motor">
    <div class="datos w3-card-4">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Preparar viaje</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Chofer DNI:<b>{{#datos}}{{#chofer}}{{dni}}{{/chofer}}{{/datos}}</b></h5>
        </div>
        <form class="w3-col" action="index.php?module=supervisor&action=elegirViaje" method="post">
            <h3 class="w3-text-orange w3-opacity w3-margin-bottom w3-margin-left">Viaje</h3>
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label class="w3-text-orange w3-opacity"><b>Origen - Destino - CUIT cliente</b></label>
                    <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="cuit">
                        <option value="" disabled selected>origen - destino</option>
                        {{#datos}}
                        {{#viaje}}
                        <option value={{10}}>{{2}} - {{3}} - {{10}}</option>
                        {{/viaje}}
                        {{/datos}}
                    </select>
                </div>
            </div>
            <div class="w3-panel">
                <input type="hidden" name="dni" value={{#datos}}{{#chofer}}{{dni}}{{/chofer}}{{/datos}}>
                <input class="w3-btn w3-orange w3-opacity w3-margin-top w3-margin-bottom" type="submit" value="Elegir viaje">
            </div>
        </form>
        <form class="w3-container" action="index.php?module=supervisor&action=asignarViaje" method="post">
            <div class="w3-half w3-padding">
                <label class="w3-text-orange w3-opacity"><b>Vehiculo</b></label>
                <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="matricula">
                    <option value="" disabled selected>patente - marca</option>
                    {{#datos}}
                    {{#vehiculo}}
                    <option value={{0}}>{{0}} {{8}}</option>
                    {{/vehiculo}}
                    {{/datos}}
                </select>
            </div>
            <div class="w3-half w3-padding">
                <label class="w3-text-orange w3-opacity"><b>arrastre</b></label>
                <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="patente">
                    <option value="" disabled selected>patente - marca - tipo</option>
                    {{#datos}}
                    {{#arrastre}}
                    <option value={{0}}>{{0}} {{1}} {{2}}</option>
                    {{/arrastre}}
                    {{/datos}}
                </select>
            </div>
            <div class="w3-col w3-padding">
                <label class="w3-text-orange w3-opacity"><b>carga - Cliente</b></label>
                <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="codigo">
                    <option value="" disabled selected>Cuit - Detalle Carga - peso</option>
                    {{#datos}}
                    {{#carga}}
                    <option value={{0}}>{{7}} - {{1}} - {{2}}</option>
                    {{/carga}}
                    {{/datos}}
                </select>
            </div>
            <div class="w3-panel">
                <input type="hidden" name="dni" value={{#datos}}{{#chofer}}{{dni}}{{/chofer}}{{/datos}}>
                <input class="w3-btn w3-orange w3-opacity w3-margin-top w3-margin-bottom" type="submit" value="Asignar">
            </div>
        </form>
    </div>
</div>
{{>footer}}