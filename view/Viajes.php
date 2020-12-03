{{>headerSupervisor}}
<div class="datos w3-container w3-display-container w3-col s11" >
    <div class=" w3-container w3-orange w3-opacity w3-hide-small" >
        <h2>Viajes</h2>
        <table class="w3-table-all w3-card-4">
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

{{>footer}}