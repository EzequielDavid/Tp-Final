<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list form-container">
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
        <h2>Usuarios</h2>
        <h5>Todos los usuarios que se encuentran registrados</h5>
        <div class="display-top-right" style="margin-top: -1.5rem;">
            <a href='index.php?module=usuario&action=listarUsuario' class='w3-button w3-teal'>Listado usuarios</a>
        </div>
        <div class="display-top-right" style="margin-top: -1.5rem;">
            <a href='index.php?module=usuario&action=listarBackupUsuario' class='w3-button w3-teal'>Backup usuarios</a>
        </div>
        <table class="w3-table-all w3-card-4 table-list">
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Licencia Conducir</th>
                <th>Rol</th>
            </tr>
            {{#usuarios}}
            <tr>
                <td class="td-list">{{0}}</td>
                <td class="td-list">{{1}}</td>
                <td class="td-list">{{2}}</td>
                <td class="td-list">{{3}}</td>
                <td class="td-list">{{4}}</td>
                <td class="td-list">
                    <form action="index.php?module=usuario&action=asignarRolUsuario" method="post">
                        <select class="w3-select w3-border w3-sand" name="rol" id="rol" onclick="elegirRol();">
                            <option class=" w3-border w3-sand" value="0" selected>Elige el rol</option>
                            <option class=" w3-border w3-sand" value="2">Supervisor</option>
                            <option class=" w3-border w3-sand" value="3">Encargado de Taller</option>
                            <option class=" w3-border w3-sand" value="4">Chofer</option>
                        </select>
                        <input type="hidden" name="dni" value={{0}}>
                        <input class="w3-btn w3-orange w3-margin-top" type="submit" value="Asginar Rol">
                    </form>
                </td>
                <td class="td-list">
                    <form action="index.php?module=usuario&action=borrarUsuario" method="POST">
                        <input type="hidden" name="dni" value={{0}}>
                        <input class="w3-btn w3-red w3-margin-bottom btn-wider" type="submit" value="Borrar Usuario">
                    </form>
                </td>
            </tr>
            {{/usuarios}}

        </table>
    </div>
</div>
</body>
{{>footer}}