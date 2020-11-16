
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="img/nova.png" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>
<body>
<div class="w3-container w3-display-container" >
    <div class="w3-container w3-orange w3-opacity w3-hide-small" >
        <h2>Vehiculos</h2>
        <table class="w3-table-all w3-card-4">
            <tr>
                <th>Matricula</th>
                <th>Año fabricacion</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Km Recorridos</th>
                <th>Estado</th>
            </tr>
            {{#vehiculos}}
            <tr>
                <td>{{matricula}}</td>
                <td>{{aÃ±o_fabricacio}}</td>
                <td>{{marca}}</td>
                <td>{{modelo}}</td>
                <td>{{kilometros_recorridos}}  </td>
                <td>{{estado}}</td>
                <td><a href='../Controlador/ControladorPokemon.php?idBorrar=$v[0]' class='w3-button w3-black'>Borrar</a></td>
            </tr>
            {{/vehiculos}}

        </table>
    </div>
</div>
</body>
{{>footer}}
