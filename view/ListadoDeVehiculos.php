<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list form-container">
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
        <h2>Vehiculos</h2>
        <h5>Todos los vehículos de la flota</h5>
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
                    <th>Patente</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Estado</th>
                    <th>Km Recorridos</th>
                </tr>
                {{#vehiculos}}
                <tr>
                    <td>{{0}}</td>
                    <td>{{8}}</td>
                    <td>{{9}}</td>
                    <td>{{1}}</td>
                    <td>{{3}}</td>
                    <td>{{2}}</td>
                    <td>
                        <form action="index.php?module=vehiculo&action=borrarVehiculo" method="POST">
                            <input type="hidden" name="matricula" value={{0}}>
                            <input class="w3-btn w3-red w3-margin-bottom btn-wider" type="submit" value="Borrar">
                        </form>
                    </td>
                    <td><!--
                        todavía hace falta hacer esta vista, muestra los datos del viaje del vehículo
                        también deben porder acceder el supervisor y mecánico-->
                        <form action="index.php?module=vehiculo&action=consultarVehiculo" method="POST">
                            <input type="hidden" name="matricula" value={{0}}>
                            <input class="w3-btn w3-black w3-margin-bottom btn-wider" type="submit" value="Consultar">
                        </form>
                    </td>
                </tr>
                {{/vehiculos}}

            </table>
        </div>
    </div>
</div>
</body>
{{>footer}}
