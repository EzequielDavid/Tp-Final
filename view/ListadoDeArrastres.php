<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list form-container">
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">


        <h2>Arrastre</h2>
        <h5>Todos los arrastres de la flota</h5>

        <div class="display-top-right">
            <a href='index.php?module=vehiculo&action=registrarArrastre' class='w3-button w3-black'>Ingresar
                arrastre</a>
        </div>
        <div class="display-top-right" style="margin-top: -1.5rem;">
            <a href='index.php?module=vehiculo&action=listarArrastres' class='w3-button w3-teal'>Listado
                arrastres</a>
        </div>
        <div class="display-top-right" style="margin-top: -1.5rem;">
            <a href='index.php?module=vehiculo&action=listarBackupArrastres' class='w3-button w3-teal'>Backup
                arrastres</a>
        </div>
        <div class="responsive-table">
            <table class="w3-table-all w3-card-4 table-list">
                <tr>
                    <th>Tipo</th>
                    <th>Patente</th>
                    <th>Chasis</th>
                    <th>Estado</th>
                </tr>
                {{#arrastres}}
                <tr>
                    <td>{{0}}</td>
                    <td>{{1}}</td>
                    <td>{{2}}</td>
                    <td>{{3}}</td>
                    <td>
                        <form action="index.php?module=vehiculo&action=borrarArrastre" method="POST">
                            <input type="hidden" name="chasis" value={{2}}>
                            <input class="w3-btn w3-red w3-margin-bottom btn-wider" type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
                {{/arrastres}}

            </table>
        </div>
    </div>


</div>

</body>
{{>footer}}
