
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="img/nova.png" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>
<body>
<div class="w3-container w3-display-container" >
    <div class="w3-container w3-orange w3-opacity w3-hide-small" >
        <h2>Vehiculos</h2> <a href='#' class='w3-button w3-black'>Ingresar vehiculo</a> <br>
        <table class="w3-table-all w3-card-4">
            <tr>
                <th>Matricula</th>
                <th>Estado</th>
                <th>Marca</th>
                <th>Km Recorridos</th>
                <th>Año fabricacion</th>
                <th>modelo</th>

            </tr>
            {{#vehiculos}}
            <tr>
                <td>{{0}}</td>
                <td>{{1}}</td>
                <td>{{2}}</td>
                <td>{{3}}</td>
                <td>{{4}}  </td>
                <td>{{5}}</td>
                <td><a href='../Controlador/ControladorPokemon.php?idBorrar=$v[0]' class='w3-button w3-black'>Borrar</a></td>
            </tr>
            {{/vehiculos}}

        </table>
    </div>
</div>
</body>
{{>footer}}
