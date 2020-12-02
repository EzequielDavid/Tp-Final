<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list" style="margin-top: 4rem; height: auto !important;">


    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
        <h2>Vehiculos</h2>
        <h6>Todos los vehículos de la flota</h6>
        <div class="display-top-right">
            <a href='index.php?module=vehiculo&action=registrarVehiculo' class='w3-button w3-dark-gray'>Ingresar
                vehiculo</a>
        </div>
        <div class="display-top-right" style="margin-top: -1.5rem;">
            <a href='index.php?module=vehiculo&action=registrarVehiculo' class='w3-button w3-teal'>Ingresar
                carga</a>
        </div>
        <div class="responsive-table">
            <table class="w3-table-all w3-card-4 table-list">
                <tr>
                    <th>Patente</th>
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
                    <td><a href='../Controlador/ControladorPokemon.php?idBorrar=$v[0]'
                           class='w3-button w3-black btn-wider'>Borrar</a>
                    </td>
                </tr>
                {{/vehiculos}}

            </table>
        </div>
    </div>
</div>
</body>
{{>footer}}
