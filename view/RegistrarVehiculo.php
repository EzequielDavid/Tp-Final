<body>

<!-- Container - Upload -->
<div class="w3-container w3-display-container">
    <div class="datos w3-card-4 margin-topbottom">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Añadir un nuevo vehículo</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Vehículo #<b>32</b></h5>
        </div>
        <form class="w3-container" action="index.php?module=vehiculo&action=agregarVehiculo" method="POST">

            <div class="w3-padding-32">

                <div class="w3-row-padding">
                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Marca</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="marca"
                               type="text" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Modelo</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="modelo" type="text"
                               required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Patente</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="matricula" type="text"
                               required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Chasis</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="numero_chasis" type="text"
                               placeholder="Número de chasis" required>
                    </div>
                </div>

            </div>
            <div class="w3-padding-32">
                <div class="w3-row-padding">

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Año de fabricación</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="anio_fabricacion" type="date"
                               placeholder="Ubicación de la estación de servicios" required>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Estado del vehículo</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="estado">
                            <option value="Sin especificar" selected>Estado</option>
                            <option value="Disponible">Disponible</option>
                            <option value="En viaje">En viaje</option>
                            <option value="Parado">Parado</option>
                        </select>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Motor</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="numero_motor" type="number"
                               placeholder="Número del motor" required="">
                    </div>

                </div>
            </div>

            <div class="w3-panel w3-section">
                <input class="w3-btn w3-orange w3-opacity" type="submit" value="Añadir"></p>
            </div>
        </form>
    </div>
</div>

{{>footer}}