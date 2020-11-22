
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="img/nova.png" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>
<body>
<div class="w3-container w3-display-container" >
    <div class="w3-container w3-orange w3-opacity w3-hide-small" >
     <h2>Usuarios Registrados</h2>
        <table class="w3-table-all w3-card-4">
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Licencia Conducir</th>
            <th>Rol</th>
        </tr>
            {{#usuarios}}
            <tr>
                <td>{{0}}</td>
                <td>{{1}}</td>
                <td>{{2}}</td>
                <td>{{3}}</td>
                <td>{{4}}  </td>
                <td><form action="index.php?module=usuario&action=asignarRolUsuario" method="post">
                    <select class="w3-select w3-border w3-sand w3-opacity " name="rol" id="rol" onclick="elegirRol();">
                        <option class=" w3-border w3-sand w3-opacity " value="" disabled selected>Elige el rol</option>
                        <option class=" w3-border w3-sand w3-opacity " value="2">Supervisor</option>
                        <option class=" w3-border w3-sand w3-opacity " value="3">Encargado de Taller</option>
                        <option class=" w3-border w3-sand w3-opacity " value="4">Chofer</option>
                    </select>
                        <input type="hidden" name="dni" value={{0}} >
                        <input class="w3-btn w3-orange" type="submit" value="Asginar Rol">
                    </form>
                </td>
                <td><form action="index.php?module=usuario&action=borrarUsuario" method="post">
                        <input type="hidden" name="dni" value={{0}} >
                        <input class="w3-btn w3-black" type="submit" value="Borrar Usuario">
                    </form>
                </td>
            </tr>
            {{/usuarios}}

    </table>
    </div>
</div>
</body>
{{>footer}}