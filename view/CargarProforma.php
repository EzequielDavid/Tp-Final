{{>headerSupervisor}}
<style>
    .hide {
        display: none;
    }
</style>


<!-- Container - Upload -->
<div class="w3-container w3-display-container container-datos-full">
    <div class="datos-full w3-card-4 margin-topbottom">
        <div class="w3-container w3-orange w3-opacity w3-display-container form-top-title">
            <h2>Cargar proforma</h2>
            <h5 class="w3-display-topright w3-section w3-margin-right trip">Proforma #<b>32</b></h5>
        </div>
        <form class="w3-container" action="index.php?module=supervisor&action=cargarClienteParaProforma" method="POST">

            <div id="paso1" class="w3-padding-32 hide">
                <div class="w3-row-padding">
                    <div class="container-titulo">
                        <h3 class="w3-text-orange w3-opacity">Cliente</h3>
                        <p class="w3-text-white w3-opacity w3-margin-bottom">Datos a completar del cliente</p>
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Denominación</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity c_not_empty" name="denominacion"
                               type="text" placeholder="Nombre de la empresa" id="c_denominacion" required="">
                    </div>

                    <div class="w3-half  w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>CUIT</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity c_not_empty" name="cuit" type="text"
                               id="c_cuit" required="" onkeypress="return solonumeros(event)">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Dirección</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity c_not_empty" name="direccion" type="text"
                               id="c_direccion" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Teléfono</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity c_not_empty" name="telefono" type="text"
                               id="c_telefono" onkeypress=" return solonumeros(event)" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity c_not_empty"><b>Email</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="email" type="email"
                               id="c_email" required="">
                    </div>

                    <div class="w3-half  w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Contacto 1</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity c_not_empty" name="contacto1" type="text"
                               placeholder="Forma de contacto alternativa" id="c_contacto1" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Contacto 2</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity c_not_empty" name="contacto2"
                               id="c_contacto2"
                               type="text"
                               required="">
                    </div>

                </div>
                <div class="w3-row-padding">
                    <div class="w3-half w3-text-red w3-opacity" id="errorPaso1"></div>
                </div>

                <div class="w3-panel w3-section right">
                    <button class="w3-btn w3-orange w3-opacity" id="btn-paso3" onclick="verificarPaso1();">Siguiente
                    </button>
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
                               type="text" placeholder="Lugar de carga" id="v_origen" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Destino</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity v_not_empty w3-margin-bottom" name="destino"
                               type="text"
                               id="v_destino" placeholder="Lugar de despacho" required="">
                    </div>

                    <div class="w3-half">
                        <label class="w3-text-orange w3-opacity"><b>Fecha de carga</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity v_not_empty w3-margin-bottom"
                               name="fecha_carga"
                               type="date" id="v_fecha_carga" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>ETA</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity v_not_empty" name="eta" type="date"
                               id="v_eta" required="">
                    </div>

                    <div class="c-mensaje w3-half w3-text-red w3-opacity" id="errorPaso2"></div>

                </div>

                <div class="space-between">
                    <div class="w3-panel w3-section left">
                        <button class="w3-btn w3-orange w3-opacity" onclick="irAlPasoAnterior(1);">Anterior</button>
                    </div>
                    <div class="w3-panel w3-section right">
                        <button class="w3-btn w3-orange w3-opacity" id="btn-paso2" onclick="verificarPaso2();">Siguiente
                        </button>
                    </div>
                </div>

            </div>

            <div id="paso3" class="w3-padding-32 hide">
                <div class="w3-row-padding">
                    <div class="container-titulo">
                        <h3 class="w3-text-orange w3-opacity">Carga</h3>
                        <p class="w3-text-white w3-opacity w3-margin-bottom">Datos a completar de la carga</p>
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Tipo de carga</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity ca_not_empty" name="option">
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

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Peso neto</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity ca_not_empty" name="peso_neto"
                               type="text" id="peso_neto" onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Hazard</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity ca_not_empty" name="option" id="hazard">
                            <option value="" disabled selected>Hazard</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="w3-half w3-margin-bottom hide" id="hazard_container">
                        <label class="w3-text-orange w3-opacity"><b>IMO Class</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity" name="option">
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

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Reefer</b></label>
                        <select class="w3-select w3-border w3-sand w3-opacity ca_not_empty" id="refeer" name="option">
                            <option value="" disabled selected>Reefer</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="w3-half w3-margin-bottom hide" id="refeer_container">
                        <label class="w3-text-orange w3-opacity"><b>Temperatura</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="temperatura"
                               type="text" id="temperatura" onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="c-mensaje w3-half w3-text-red w3-opacity" id="errorPaso3"></div>

                </div>
                <div class="space-between">
                    <div class="w3-panel w3-section left">
                        <button class="w3-btn w3-orange w3-opacity" onclick="irAlPasoAnterior(2);">Anterior</button>
                    </div>
                    <div class="w3-panel w3-section right">
                        <button class="w3-btn w3-orange w3-opacity" id="btn-paso3" onclick="verificarPaso3();">Siguiente
                        </button>
                    </div>
                </div>
            </div>

            <div id="paso4" class="w3-padding-32">
                <div class="w3-row-padding">

                    <div class="container-titulo">
                        <h3 class="w3-text-orange w3-opacity">Costeo estimado</h3>
                        <p class="w3-text-white w3-opacity w3-margin-bottom">Costeo estimado del viaje</p>
                    </div>

                    <div class="container-subtitulo" style="margin-top: 3rem;">
                        <h4 class="w3-text-orange w3-opacity"><b>Fechas</b></h4>
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>ETD</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="etd"
                               type="date" id="co_etd" placeholder="Tiempo estimado de partida"
                               onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>ETA</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="eta" type="date"
                               id="co_eta"
                               onkeypress="return solonumerosYPunto(event)" required="">
                    </div>


                    <div class="container-subtitulo">
                        <h4 class="w3-text-orange w3-opacity"><b>Recorridos</b></h4>
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Kilometros</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="kilometros"
                               type="text" placeholder="Kilometros a recorrer" id="kilometros"
                               onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Combustible</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="combustible"
                               type="text" id="combustible" placeholder="Combustible a utilizar"
                               onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="container-subtitulo">
                        <h4 class="w3-text-orange w3-opacity"><b>Gastos</b></h4>
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Viáticos</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="viaticos"
                               type="text" id="viaticos" onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Peajes y pasajes</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="peajes_pasajes"
                               type="text" id="peajes_pasajes" onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Extras</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="extras"
                               type="text" placeholder="Gastos extras" id="extras"
                               onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Hazard</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="hazard" id="hazard"
                               type="text" onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Reefer</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="reefer"
                               type="text" id="reefer" onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity w3-section"><b>Fee</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity co_not_empty" name="fee" type="text"
                               id="fee" onkeypress="return solonumerosYPunto(event)" required="">
                    </div>

                    <div class="c-mensaje w3-half w3-text-red w3-opacity" id="errorPaso4"></div>

                </div>
                <div class="space-between">
                    <div class="w3-panel w3-section left">
                        <button class="w3-btn w3-orange w3-opacity" onclick="irAlPasoAnterior(3);">Anterior</button>
                    </div>
                    <div class="w3-panel w3-section right">
                        <div class="w3-panel w3-section right" id="confirmar">
                            <input class="w3-btn w3-orange w3-opacity" type="submit" onclick="verificarPaso4();"
                                   value="Confirmar">
                        </div>
                    </div>
                </div>
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