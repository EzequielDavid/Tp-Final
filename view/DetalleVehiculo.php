<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list" style="margin-top:8% ">
    <div class="w3-container w3-orange  w3-hide-small w3-margin w3-padding container-list-sm">
        {{#vehiculo}}
        <div class="w3-container">
            <h1>Detalle de Vehiculo:'{{#vehiculo}}{{matricula}}{{/vehiculo}}'</h1>
            <div class="w3-quarter">
                <h3>Matricula:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{matricula}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Estado:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{estado}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Km Recorridos:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{kilometros_recorridos}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Numero de Chasis:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{numero_chasis}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Numero de Motor:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{numero_motor}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Alarma:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{alarma}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Marca:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{marca}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Modelo:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{modelo}}</h3>
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
            <div class="w3-quarter">
                <h3>Latitud:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{latitud}} </h3>
            </div>
            <div class="w3-quarter">
                <h3>Longitud:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{longitud}} </h3>
            </div>

        </div>
        {{/vehiculo}}
    </div>
    <div style="float: none;clear: both"></div>
</body>
<div class=" w3-col" style="position: absolute; bottom: -40%">{{>footer}}</div>


