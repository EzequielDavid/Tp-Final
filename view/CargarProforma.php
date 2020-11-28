{{>headerSupervisor}}
<style>
    .hide {
        display: none;
    }
</style>


<!-- Container - Upload -->
<div class="w3-container w3-display-container">
    <div class="datos w3-card-4 margin-topbottom">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Cargar proforma</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Proforma #<b>32</b></h5>
        </div>
        <form class="w3-container" action="index.php?module=supervisor&action=cargarClienteParaProforma" method="POST">

            <div id="paso1" class="w3-padding-32">
                <div class="w3-row-padding">
                    <div class="container-titulo">
                        <h3 class="w3-text-orange w3-opacity">Cliente</h3>
                        <p class="w3-text-white w3-opacity w3-margin-bottom">Datos a completar del cliente</p>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Denominación</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="denominacion"
                               type="text" placeholder="Nombre de la empresa" id="c-denominacion" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>CUIT</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="cuit" type="number"
                               id="c-cuit" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Dirección</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="direccion"
                               type="text" id="c-direccion" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Teléfono</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="telefono" type="number"
                               id="c-telefono" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Email</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="email" type="email"
                               id="c-email" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Contacto 1</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="contacto1" type="text"
                               placeholder="Forma de contacto alternativa" id="c-contacto1" required="">
                    </div>

                    <div class="w3-half ">
                        <label class="w3-text-orange w3-opacity"><b>Contacto 2</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="contacto2" id="c-contacto2"
                               type="text"
                               required="">
                    </div>

                    <p class="c-mensaje" id="c-mensaje"></p>

                </div>
                <div class="w3-panel w3-section right">
                    <button class="w3-btn w3-orange w3-opacity" id="paso1" onclick="irPaso2();">Siguiente</button>
                </div>
            </div>

            <div id="paso2" class="w3-padding-32 hide">
                <div class="w3-row-padding">
                    <div class="container-titulo">
                        <h3 class="w3-text-orange w3-opacity">Viaje</h3>
                        <p class="w3-text-white w3-opacity w3-margin-bottom">Datos a completar relacionados al viaje</p>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Origen</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="origen"
                               type="text" placeholder="Lugar de carga" id="origen" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Destino</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="destino" type="text"
                               id="destino" placeholder="Lugar de despacho" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Fecha de carga</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="fecha_carga"
                               type="date" id="fecha_carga" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>ETA</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="eta" type="number" id="eta"
                               required="">
                    </div>

                    <p class="c-mensaje" id="c-mensaje"></p>

                </div>
                <div class="w3-panel w3-section right">
                    <button class="w3-btn w3-orange w3-opacity" onclick="irPaso3();">Siguiente</button>
                </div>
            </div>

            <div id="paso3" class="w3-padding-32 hide">
                <div class="w3-row-padding">
                    <div class="container-titulo">
                        <h3 class="w3-text-orange w3-opacity">Carga</h3>
                        <p class="w3-text-white w3-opacity w3-margin-bottom">Datos a completar de la carga</p>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Tipo de carga</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="option">
                            <option value="" disabled selected>Tipo</option>
                            <option value="Granel">Granel</option>
                            <option value="CarCarrier">CarCarrier</option>
                            <option value="20"
                            ">20"</option>
                            <option value="40"
                            ">40"</option>
                            <option value="Jaula">Jaula</option>
                            <option value="CarCarrier">CarCarrier</option>
                        </select>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Peso neto</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="peso_neto"
                               type="number"
                               id="peso_neto" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Hazard</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="option">
                            <option value="" disabled selected>Hazard</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>IMO Class</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="option">
                            <option value="" disabled selected>Clase</option>
                            <option value="Granel">Explosivos</option>
                            <option value="CarCarrier">Gases</option>
                            <option value="20"
                            ">Liquidos inflamables</option>
                            <option value="40"
                            ">Sólidos o sustancias inflamables</option>
                            <option value="Jaula">Sólidos inflamables</option>
                            <option value="CarCarrier">Sustancias inflamables</option>
                            <option value="CarCarrier">Sustancias oxidantes</option>
                            <option value="CarCarrier">Peróxidos orgánicos</option>
                            <option value="CarCarrier">Sustancias toxicas</option>
                            <option value="CarCarrier">Sustancias infecciosas</option>
                            <option value="CarCarrier">Sustancias radioactivas</option>
                            <option value="CarCarrier">Sustancias inflamables</option>
                            <option value="CarCarrier">Corrosivos</option>
                            <option value="CarCarrier">Sustancias y artículos peligrosos</option>
                        </select>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Reefer</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity w3-margin-bottom" name="option">
                            <option value="" disabled selected>Reefer</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Temperatura</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="temperatura"
                               type="number" id="temperatura" required="">
                    </div>

                    <p class="c-mensaje" id="c-mensaje"></p>

                </div>
                <div class="w3-panel w3-section right">
                    <button class="w3-btn w3-orange w3-opacity" onclick="irPaso4();">Siguiente</button>
                </div>
            </div>

            <div id="paso4" class="w3-padding-32 hide">
                <div class="w3-row-padding">

                    <div class="container-titulo">
                        <h3 class="w3-text-orange w3-opacity">Costeo estimado</h3>
                        <p class="w3-text-white w3-opacity w3-margin-bottom">Costeo estimado del viaje</p>
                    </div>

                    <div class="container-subtitulo" style="margin-top: 3rem;">
                        <h4 class="w3-text-orange w3-opacity"><b>Fechas</b></h4>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>ETD</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="etd"
                               type="date" id="etd" placeholder="Tiempo estimado de partida" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity w3-section"><b>ETA</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="eta" type="date" id="eta"
                               required="">
                    </div>


                    <div class="container-subtitulo">
                        <h4 class="w3-text-orange w3-opacity"><b>Recorridos</b></h4>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Kilometros</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="kilometros"
                               type="number" placeholder="Kilometros a recorrer" id="kilometros" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Combustible</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="combustible"
                               type="number"
                               id="combustible" placeholder="Combustible a utilizar" required="">
                    </div>

                    <div class="container-subtitulo">
                        <h4 class="w3-text-orange w3-opacity"><b>Gastos</b></h4>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Viáticos</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="viaticos"
                               type="number" id="viaticos"
                               required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Peajes y pasajes</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="peajes_pasajes"
                               type="number"
                               id="peajes_pasajes" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Extras</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="extras"
                               type="number"
                               placeholder="Gastos extras" id="extras" required="">
                    </div>

                    <div class="w3-half ">
                        <label class="w3-text-orange w3-opacity"><b>Hazard</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="hazard" id="hazard"
                               type="number" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Reefer</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="reefer"
                               type="number" id="reefer" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Fee</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity w3-margin-bottom" name="fee" type="number"
                               id="fee"
                               required="">
                    </div>

                    <p class="c-mensaje" id="c-mensaje"></p>

                </div>

            </div>

            <div class="w3-panel w3-section right hide" id="confirmar">
                <input class="w3-btn w3-orange w3-opacity" type="submit" value="Confirmar">
            </div>
        </form>
    </div>
</div>
<script>
    var paso1 = document.getElementById("paso1");
    var paso2 = document.getElementById("paso2");
    var paso3 = document.getElementById("paso3");
    var paso4 = document.getElementById("paso4");
    var confirmar = document.getElementById("confirmar");

    function irPaso2(){
        paso1.classList.toggle("hide");
        paso2.classList.toggle("hide");
    }

    function irPaso3(){
        paso2.classList.toggle("hide");
        paso3.classList.toggle("hide");
    }

    function irPaso4(){
        paso3.classList.toggle("hide");
        paso4.classList.toggle("hide");
        confirmar.classList.toggle("hide");
    }
</script>

{{>footer}}