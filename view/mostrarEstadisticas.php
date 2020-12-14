
<!--    
<div class="w3-container w3-display-container margin-top w3-padding container-list form-container"> 
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
        <h2 style="text-align: center;">Reportes Estadisticos</h2> 
    </div>

</div>
-->

<div class="w3-container w3-display-container margin-top w3-padding container-list form-container"> 
    <div class="w3-container w3-orange w3-margin w3-padding container-list-sm">
       <h2 style="text-align: center;">Reportes Estadisticos</h2> 
        <div class="responsive-table">
            
            <table class="w3-table-all w3-card-4 table-list">
                
                {{#datos}}

                <tr><th style="background: #FFC300;">REPORTE DE VEHICULOS</th><th style="background: #FFC300;"></th></tr>
                <tr><th></th><th style="background: #FFC300;">Total</th></tr>
                <tr><td>Vehiculos de la empresa</td><td>{{vehiculos}}</td></tr>
                <tr><td>Vehiculos disponibles</td><td>{{vehiculosDisponibles}}</td></tr>
                <tr><td>Vehiculos Ocupados</td><td>{{vehiculosOcupados}}</td></tr>
                <tr><td>Vehiculos fuera de servicio por mantenimiento</td><td>{{fueraDeServicio}}</td></tr>
                <tr><td>Costo de vehiculos por mantenimiento</td><td>{{costos}}</td></tr>
                

                <tr><th style="background: #FFC300;">REPORTE DE VIAJES</th><th style="background: #FFC300;"></th></tr>
                <tr><th></th><th style="background: #FFC300;">Total</th></tr>
                <tr><td>Viajes en curso</td><td>{{viajesEnCurso}}</td></tr>
                <tr><td>Viajes pendientes</td><td>{{viajesPendientes}}</td></tr>
                <tr><td>Viajes realizados</td><td>{{viajes}}</td></tr>
                <tr><td>kilometros recorridos en todos los viajes finalizados</td><td>{{kilometros}}</td></tr>
                
    
                
                <tr><th style="background: #FFC300;">REPORTE DE ARRASTRES</th><th style="background: #FFC300;"></th></tr>
                <tr><th></th><th style="background: #FFC300;">Total</th></tr>
                <tr><td>Total de arrastres de la empresa</td><td>{{arrastres}}</td></tr>
                <tr><td>Total de arrastres disponibles</td><td>{{arrastresDisponibles}}</td></tr>
                <tr><td>Total de arrastres ocupados</td><td>{{arrastresOcupados}}</td></tr>
        
                <!--
                <tr><th></th><td><form action="index.php?module=grafico&action=mostrarGrafico" method="POST">
                            <input type="hidden" name="grafico" value="">
                            <input class="w3-btn w3-red w3-margin-bottom btn-wider" type="submit" value="Graficos">
                        </form></td></tr>
-->
                    
                {{/datos}}

            </table>
        </div>
    </div>

</div>


