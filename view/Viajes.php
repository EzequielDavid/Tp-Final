<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list form-container">
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
        <h2>Viajes</h2>
        <h5>Listado de los vehículos y sus choferes</h5>
        <div class="display-top-right">
            <a href='index.php?module=vehiculo&action=registrarVehiculo' class='w3-button w3-black'>Ingresar
                vehiculo</a>
        </div>
        <div class="display-top-right" style="margin-top: -1.5rem;">
            <a href='index.php?module=vehiculo&action=listarVehiculos' class='w3-button w3-teal'>Listado vehículos</a>
        </div>
        <div class="display-top-right" style="margin-top: -1.5rem;">
            <a href='index.php?module=vehiculo&action=listarBackupVehiculo' class='w3-button w3-teal'>Backup
                vehículos</a>
        </div>
        <div class="responsive-table">
            <table class="w3-table-all w3-card-4 table-list">
                <tr>
                    <th>N° Viaje</th>
                    <th>Estado</th>
                    <th>Destino</th>
                    <th>Cliente</th>
                    <th>Vehiculo</th>
                    <th>Chofer DNI</th>
                    <th>Chofer licencia</th>
                </tr>
                {{#viajes}}
                <tr>
                    <td>{{0}}</td>
                    <td>{{1}}</td>
                    <td>{{2}}</td>
                    <td>{{3}}</td>
                    <td>{{4}}  </td>
                    <td>{{5}}</td>
                    <td>{{6}}</td>

                </tr>
                {{/viajes}}

            </table>
        </div>
    </div>
</div>
</body>
{{>footer}}
