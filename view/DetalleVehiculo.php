<body>
    <div class="w3-container w3-display-container margin-top w3-padding container-list form-container">
        <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
            <div class="w3-container">
                {{#vehiculo}}
                <div class="w3-col ">
                    <h1>Detalle de vehiculo: '{{#vehiculo}}{{matricula}}{{/vehiculo}}'</h1>
                </div>
                <div class="w3-quarter">
                    <h3>Matricula:</h3>
                </div>
                <div class="w3-rest w3-white w3-opacity">
                    <h3 class="w3-margin-left">{{matricula}}</h3>
                </div>
                <div class="w3-quarter">
                    <h3>Modelo:</h3>
                </div>
                <div class="w3-rest w3-white w3-opacity">
                    <h3 class="w3-margin-left">{{modelo}} </h3>
                </div>
                <div class="w3-quarter">
                    <h3>Marca:</h3>
                </div>
                <div class="w3-rest w3-white w3-opacity">
                    <h3 class="w3-margin-left">{{marca}} </h3>
                </div>
                <div class="w3-quarter">
                    <h3>Año de fabriacion:</h3>
                </div>
                <div class="w3-rest w3-white w3-opacity">
                    <h3 class="w3-margin-left">{{anio_fabricacion}} </h3>
                </div>
                <div class="w3-quarter">
                    <h3>Ultimo service:</h3>
                </div>
                <div class="w3-rest w3-white w3-opacity">
                    <h3 class="w3-margin-left">{{ultimo_service}} </h3>
                </div>
            </div>
            {{/vehiculo}}

        </div>
    </div>
</body>
<div class="w3-display-bottommiddle w3-col">{{>footer}}</div>

