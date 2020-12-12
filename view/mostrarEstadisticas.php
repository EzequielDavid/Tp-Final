
<body>  
    
<div class="w3-container w3-display-container margin-top w3-padding container-list form-container"> 
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
        <h2 style="text-align: center;">Reportes Estadisticos</h2> 
        
    </div>

</div>



<div class="w3-container w3-display-container margin-top w3-padding container-list form-container"> 
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
       
        <div class="responsive-table">
            
            <table class="w3-table-all w3-card-4 table-list">
                
               <tr>
                    <th></th>
                    <th>Cantidad</th>
                    
                </tr>
                {{#estadisticas}}
                <tr>
                    <th>VEHICULOS FUERA DE SERVICIO</th>
                    <td>{{cantidad}}</td>
                    

                </tr>
                {{/estadisticas}}

            </table>
        </div>
    </div>

</div>

</body>

