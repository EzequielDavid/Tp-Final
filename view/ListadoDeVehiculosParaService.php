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
                <th>Km Recorridos</th>
                <th>Motor</th>
                <th>Chasis</th>
                <th>alarma</th>
                <td>Ultimo service</td>
            </tr>
            {{#vehiculos}}
            <tr>
                <td>{{0}}</td>
                <td>{{8}}</td>
                <td>{{7}}</td>
                <td>{{2}}</td>
                <td>{{5}}</td>
                <td>{{4}}</td>
                <td>{{6}}</td>
                <td>{{12}}</td>
                <td><form action="index.php?module=encargadoDeTaller&action=mantenimiento" method="post" class="w3-third">
                        <input type="hidden" name="matricula" value="{{0}}">
                        <input class="w3-btn w3-orange w3-margin-top" type="submit" value="Iniciar Mantenimiento">
                    </form>
                </td>
            </tr>
            {{/vehiculos}}

        </table>
    </div>
</div>
</body>
{{>footer}}

