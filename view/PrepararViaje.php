
<div class="w3-container w3-display-container">
    <img src="img/.jpg" class="responsive w3-circle" id="motor">
    <div class="datos w3-card-4">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Preparar viaje</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Chofer DNI:<b>{{#datos}}{{#chofer}}{{dni}}{{/chofer}}{{/datos}}</b></h5>
        </div>
        <form class="w3-container" action="index.php?module=supervisor&action=asignarViaje" method="post">

            <h3 class="w3-text-orange w3-opacity w3-margin-bottom">Datos</h3>

            <div class="w3-row-padding">
                <div class="w3-half">
                    <label class="w3-text-orange w3-opacity"><b>Cliente</b></label>
                    <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="cliente" type="text" required>
                </div>

                <div class="w3-half">
                    <label class="w3-text-orange w3-opacity"><b>Destino</b></label>
                    <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="destino" type="text" required>
                </div>

                <div class="w3-half">
                    <label class="w3-text-orange w3-opacity"><b>Km viaje</b></label>
                    <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="kmviaje" type="number"
                           required>
                </div>

                <div class="w3-half w3-margin-bottom">
                    <label class="w3-text-orange w3-opacity"><b>Tiempo estimado de viaje</b></label>
                    <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="" type="text"
                           required>
                </div>


                <h3 class="w3-text-orange w3-opacity w3-margin-top">Equipo para realizar entrega</h3>

                <div class="w3-half">
                    <label class="w3-text-orange w3-opacity"><b>Vehiculo</b></label>
                    <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="matricula">
                        <option value="" disabled selected>patente marca</option>
                        {{#datos}}
                        {{#vehiculo}}
                        <option value={{0}}>{{0}} {{8}}</option>
                        {{/vehiculo}}
                        {{/datos}}
                    </select>
                </div>

                <div class="w3-half">
                    <label class="w3-text-orange w3-opacity"><b>Equipo de arrastre</b></label>
                    <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="patente">
                        <option value="" disabled selected>patente </option>
                        {{#datos}}
                        {{#arrastre}}
                        <option value={{0}}>{{0 }} </option>
                        {{/arrastre}}
                        {{/datos}}
                    </select>
                </div>
            </div>



            <div class="w3-panel">
                <input type="hidden" name="dni" value={{#datos}}{{#chofer}}{{dni}}{{/chofer}}{{/datos}}>
                <input class="w3-btn w3-orange w3-opacity w3-margin-top w3-margin-bottom" type="submit" value="Asignar">
            </div>
        </form>
    </div>
</div>
{{>footer}}