<body>
    <div class="w3-container w3-display-container margin-top w3-padding container-list form-container">
        <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">

            <div class="responsive-table">
                <h1>Detalle de Vehiculo '{{#vehiculo}}{{matricula}}{{/vehiculo}}'</h1>
                <table class="w3-table-all w3-card-4 table-list">
                    <tr>
                        <th>Matricula</th>
                        <th>Estado</th>
                        <th>Km Recorridos</th>
                        <th>Año de Fabricacion</th>
                        <th>Numero de Chasis</th>
                        <th>Numero de Motor</th>
                        <th>Alarma</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ultimo Service</th>
                    </tr>
                    {{#vehiculo}}
                    <tr>
                        <td>{{matricula}}</td>
                        <td>{{estado}}</td>
                        <td>{{kilometros_recorridos}}</td>
                        <td>{{anio_fabricacion}}</td>
                        <td>{{numero_chasis}}</td>
                        <td>{{numero_motor}}</td>
                        <td>{{alarma}}</td>
                        <td>{{marca}}</td>
                        <td>{{modelo}}</td>
                        <td>{{ultimo_service}}</td>
                    </tr>
                    {{/vehiculo}}

                </table>
            </div>

        </div>
    </div>
</body>
<div class="w3-display-bottommiddle w3-col">{{>footer}}</div>

