
<body>
<div class="w3-container w3-display-container margin-top w3-padding container-list">
    <div class="w3-container w3-orange  w3-hide-small w3-margin w3-padding container-list-sm">
        <h2>Service</h2>
        {{#service}}
        <div class="w3-container">
            <div class="w3-quarter ">
                <h3>N°mantenimiento:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{id_mantenimiento}}</h3>
            </div>
            <div class="w3-quarter">
                <h3>Fecha de mantenimiento:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{fecha_mantenimiento}}</h3>
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
            <div class="w3-quarter">
                <h3>Detalle service:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">{{detalle_service}} </h3>
            </div>
            <div class="w3-quarter">
                <h3>Costo total:</h3>
            </div>
            <div class="w3-rest w3-white w3-opacity">
                <h3 class="w3-margin-left">${{costo}} </h3>
            </div>
        </div>
        {{/service}}
    </div>

</div>
</body>
