{{>headerSupervisor}}

<div class="datos w3-container w3-display-container w3-col s11">
    <div class=" w3-container w3-orange w3-opacity w3-hide-small" >
        <h2>Choferes</h2>
        <table class="w3-table-all w3-card-4">
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Licencia Conducir</th>
                <th>Vehiculo asginado</th>
                <th>Viaje destino</th>
            </tr>
            {{#choferes}}
            <tr>
                <td>{{0}}</td>
                <td>{{1}}</td>
                <td>{{2}}</td>
                <td>{{3}}</td>
                <td>{{4}}  </td>
                <td>{{5}}</td>
                <td><form action="index.php?module=supervisor&action=prepararViaje" method="post">
                        <input type="hidden" name="dni" value={{0}} >
                        <input class="w3-btn w3-black" type="submit" value="Asignar viaje">
                    </form>
                </td>
            </tr>
            {{/choferes}}

        </table>
    </div>
</div>
{{>footer}}
