<header class="w3-display-container w3-content w3-wide header-nova" id="home">
    <img class="w3-image img-nova" src="img/nova.png" alt="Architecture">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>
<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list">
    <div class="w3-container w3-orange w3-hide-small w3-margin w3-padding container-list-sm">
        <h2>Usuarios Registrados</h2>
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
                    <!--<form action="index.php?module=usuario&action=bloquearUsuario" method="POST">
                        <input type="hidden" name="dni" value={{0}}>
                        <input class="w3-btn w3-black w3-margin-right" type="submit" value="Bloquear">
                    </form>-->
                </td>
            </tr>
            {{/usuarios}}

        </table>
    </div>
</div>
</body>
{{>footer}}