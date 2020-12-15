<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list form-container">
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">

        <h2>Mantenimiento hecho</h2>
        <h5>Todos los services hechos en los vehiculos</h5>


        <div class="responsive-table">
            <table class="w3-table-all w3-card-4 table-list">
                <tr>
                    <th>N° Mantenimiento</th>
                    <th>Fecha</th>
                    <th>Matricula</th>
                </tr>
                {{#service}}
                <tr>
                    <td>{{0}}</td>
                    <td>{{1}}</td>
                    <td>{{2}}</td>
                    <td>
                        <form action="index.php?module=encargadoDeTaller&action=detalleMantenimiento" method="POST">
                            <input type="hidden" name="idMantenimiento" value={{0}}>
                            <input class="w3-btn w3-black w3-margin-bottom btn-wider" type="submit"
                                   value="Consultar">
                        </form>
                    </td>
                </tr>
                {{/service}}

            </table>
        </div>


    </div>

</div>
</body>
<div class="w3-display-bottommiddle w3-col s12">{{>footer}}</div>
