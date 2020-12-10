<body>

<!-- Container - Upload -->
<div class="w3-container w3-display-container container-datos-full form-flota">
    <div class="w3-card-4 margin-topbottom datos-full">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Añadir un nuevo arrastre</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Arrastre</h5>
        </div>
        <form class="w3-container" action="index.php?module=vehiculo&action=agregarArrastre" method="POST">

            <div class="w3-padding-32">

                <div class="w3-row-padding" style="margin-top: 2rem;">
                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Tipo arrastre</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity" name="tipo"
                                required="">
                            <option value="Sin especificar" selected>Arrastre</option>
                            <option value="Araña">Araña</option>
                            <option value="Jaula">Jaula</option>
                            <option value="Tanque">Tanque</option>
                            <option value="Granel">Granel</option>
                            <option value="CarCarrier">CarCarrier</option>
                        </select>
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Patente</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="patente" type="text"
                               required="">
                    </div>

                    <div class="w3-half w3-margin-bottom" style="margin-top: 2rem;">
                        <label class="w3-text-orange w3-opacity"><b>Chasis</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="chasis" type="number" required="">
                    </div>

                </div>

            </div>

            <div class="w3-panel w3-section" style="margin-top: 12.8rem !important; display: flex; justify-content: flex-end">
                <input class="w3-btn w3-orange w3-opacity" type="submit" value="Añadir""></p>
            </div>
        </form>
    </div>
</div>

{{>footer}}