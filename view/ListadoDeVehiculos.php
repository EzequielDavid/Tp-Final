<header class="w3-display-container w3-content w3-wide header-nova" id="home">
    <img class="w3-image img-nova" src="img/nova.png" alt="Architecture">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>
<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list">
    <div class="w3-container w3-orange w3-hide-small w3-margin w3-padding container-list-sm">
        <h2>Vehiculos</h2>
        <div class="display-top-right">
            <a href='index.php?module=vehiculo&action=registrarVehiculo' class='w3-button w3-black'>Ingresar vehiculo</a>
        </div>
        <table class="w3-table-all w3-card-4 table-list">
            <tr>
                <th>Matricula</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Estado</th>
                <th>Km Recorridos</th>
                <th>Posición</th>
            </tr>
            {{#vehiculos}}
            <tr>
                <td>{{0}}</td>
                <td>{{8}}</td>
                <td>{{9}}</td>
                <td>{{1}}</td>
                <td>{{3}}</td>
                <td>{{2}}</td>
                <td><a href='../Controlador/ControladorPokemon.php?idBorrar=$v[0]' class='w3-button w3-black btn-wider'>Borrar</a>
                </td>
            </tr>
            {{/vehiculos}}

        </table>
    </div>
</div>
</body>
{{>footer}}
