<header class="w3-display-container w3-wide header-nova" style="width: 100% !important;" id="home">
    <img class="w3-image img-nova" src="img/slide_supervisor.png" style="width: 100% !important;" alt="Architecture"
         width="100%" height="100%">
</header>
<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list">
    <div class="w3-container w3-orange w3-hide-small w3-margin w3-padding container-list-sm">
        <h2>Vehículos</h2>

        <table class="w3-table-all w3-card-4 table-list">
            <tr >
                <th>Matrícula</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Estado</th>
                <th>Km Recorridos</th>
                <th>Último Service</th>
            </tr>
            {{#vehiculos}}
            <tr>
                <td>{{0}}</td>
                <td>{{8}}</td>
                <td>{{7}}</td>
                <td><form action="index.php?module=supervisor&action=asignarEstadoVehiculo" method="post" class="w3-third" style="display: flex; align-items: center; width: 100%; height: 100%                <td><form action="index.php?module=supervisor&action=asignarEstadoVehiculo" method="post" class="w3-third" style="display: flex; align-items: center; align-content: center; width: 100%; height: 100%";">
                        <select class="w3-select w3-border w3-sand" name="estado" id="estado" style="width: auto; margin-right: 1rem;">
                            <option class=" w3-border w3-sand" value="0" selected>{{1}}</option>
                            <option class=" w3-border w3-sand" value="Mantenimiento">Mantenimiento</option>

                        </select>
                        <input type="hidden" name="matricula" value={{0}}>
                        <input class="w3-btn w3-orange" type="submit" value="Actualizar">
                    </form>
                </td>
                <td>{{2}}</td>
                <td>{{12}}</td>

            </tr>
            {{/vehiculos}}

        </table>
    </div>
</div>
</body>
{{>footer}}

