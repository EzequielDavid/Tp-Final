<header class="w3-display-container w3-content w3-wide header-nova" id="home">
    <img class="w3-image img-nova" src="img/nova.png" alt="Architecture">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>
<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list">
    <div class="w3-container w3-orange w3-hide-small w3-margin w3-padding container-list-sm">
        <h2>Vehiculos</h2>

        <table class="w3-table-all w3-card-4 table-list">
            <tr>
                <th>Matricula</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Estado</th>
                <th>Km Recorridos</th>
                <th>Ultimo Service</th>
            </tr>
            {{#vehiculos}}
            <tr>
                <td>{{0}}</td>
                <td>{{8}}</td>
                <td>{{7}}</td>
                <td><form action="index.php?module=supervisor&action=asignarEstadoVehiculo" method="post" class="w3-third">
                        <select class="w3-select w3-border w3-sand" name="estado" id="estado" >
                            <option class=" w3-border w3-sand" value="0" selected>{{1}}</option>
                            <option class=" w3-border w3-sand" value="mantenimiento">Mantenimiento</option>

                        </select>
                        <input type="hidden" name="matricula" value={{0}}>
                        <input class="w3-btn w3-orange w3-margin-top" type="submit" value="Enviar a Mantenimiento">
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

