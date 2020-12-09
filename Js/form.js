var paso1 = document.getElementById("paso1");
var paso2 = document.getElementById("paso2");
var paso3 = document.getElementById("paso3");
var paso4 = document.getElementById("paso4");
var confirmar = document.getElementById("confirmar");


//PASO 1
var campos_vacios_paso1 = document.getElementsByClassName("c_not_empty");
var c_cuit = document.getElementById("c_cuit");
var c_telefono = document.getElementById("c_telefono");
var errorPaso1 = document.getElementById("errorPaso1");


function verificarPaso1() {
    limpiarErrores(errorPaso1);

    if (camposVacios(campos_vacios_paso1))
        errorPaso1.innerHTML += "<h4 class='w3-section c_mensaje'><b>*</b> Deben completarse todos los campos</h4>";

    if (document.getElementsByClassName("c_mensaje").length === 0)
        irAlSiguientePaso(paso2, paso1);
}

c_cuit.addEventListener('keyup', function () {
    if (c_cuit.value.length >= 2 && c_cuit.value.length <= 3)
        c_cuit.value = c_cuit.value + ".";

    else if (c_cuit.value.length >= 11 && c_cuit.value.length <= 12)
        c_cuit.value = c_cuit.value + ".";

    else if (c_cuit.value.length > 14)
        c_cuit.value = c_cuit.value.substring(0, c_cuit.value.length - 1);

});

c_telefono.addEventListener('keyup', function () {
    if (c_telefono.value.length > 10)
        c_telefono.value = c_telefono.value.substring(0, c_telefono.value.length - 1);

});

//PASO 2
var campos_vacios_paso2 = document.getElementsByClassName("v_not_empty");
var v_fecha_carga = document.getElementById("v_fecha_carga");
var v_eta = document.getElementById("v_eta");
    var errorPaso2 = document.getElementById("errorPaso2");


function verificarPaso2() {
    limpiarErrores(errorPaso2);

    if (camposVacios(campos_vacios_paso2))
        errorPaso2.innerHTML += "<h4 class='w3-section v_mensaje'><b>*</b> Deben completarse todos los campos</h4>";

    if (document.getElementsByClassName("v_mensaje").length === 0)
        irAlSiguientePaso(paso3, paso2);
}

//PASO 3
var campos_vacios_paso3 = document.getElementsByClassName("ca_not_empty");
var hazard = document.getElementById("hazard");
var hazard_container = document.getElementById("hazard_container");
var refeer = document.getElementById("refeer");
var refeer_container = document.getElementById("refeer_container");
var errorPaso3 = document.getElementById("errorPaso3");


function verificarPaso3() {
    limpiarErrores(errorPaso3);
    if (camposVacios(campos_vacios_paso3))
        errorPaso3.innerHTML += "<h4 class='w3-section ca_mensaje'><b>*</b> Deben completarse todos los campos</h4>";

    if (document.getElementsByClassName("ca_mensaje").length === 0)
        irAlSiguientePaso(paso4, paso3);
}

c_telefono.addEventListener('keyup', function () {
    if (c_telefono.value.length > 10)
        c_telefono.value = c_telefono.value.substring(0, c_telefono.value.length - 1);

});

refeer.addEventListener("click", function () {
    if (refeer.value === "Si")
        refeer_container.classList.remove("hide");
    else
        refeer_container.classList.add("hide");
});

hazard.addEventListener("click", function () {
    if (hazard.value === "Si")
        hazard_container.classList.remove("hide");
    else
        hazard_container.classList.add("hide");
});


//PASO 4
var campos_vacios_paso4 = document.getElementsByClassName("co_not_empty");
var co_etd = document.getElementById("co_etd");
var co_eta = document.getElementById("co_eta");
var errorPaso4 = document.getElementById("errorPaso4");
var btn_confirmar = document.getElementById("btn_confirmar");

function verificarPaso4() {
    limpiarErrores(errorPaso4);
    if (camposVacios(campos_vacios_paso4))
        errorPaso4.innerHTML += "<h4 class='w3-section co_mensaje'><b>*</b> Deben completarse todos los campos</h4>";

    if (fechaInvalida(co_etd))
        errorPaso4.innerHTML += "<h4 class='w3-section co_mensaje'><b>*</b> La fecha debe ser mayor a la actual</h4>";

    if (co_eta.value <= co_etd.value)
        errorPaso4.innerHTML += "<h4 class='w3-section co_mensaje'><b>*</b> La fecha de arribo no puede ser antes que la fecha de partida</h4>";

    if (document.getElementsByClassName("co_mensaje").length === 0)
        btn_confirmar.onsubmit;
}


//GENERALES


function limpiarErrores(errorPaso) {
    return errorPaso.innerHTML = "";
}

function camposVacios(campos) {
    for (let i = 0; i < campos.length; i++)
        if (campos[i].value === "") return true;
}

function irAlSiguientePaso(siguientePaso, actualPaso) {
    actualPaso.classList.toggle("hide");
    siguientePaso.classList.toggle("hide");
}

function irAlPasoAnterior(numPasoAnterior) {
    let pasoActual = "paso" + (numPasoAnterior + 1);
    let pasoAnterior = "paso" + numPasoAnterior;

    pasoActual = document.getElementById(pasoActual);
    pasoAnterior = document.getElementById(pasoAnterior);

    pasoActual.classList.toggle("hide");
    pasoAnterior.classList.toggle("hide");
}

function solonumeros(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    numeros = '0123456789';
    especiales = '8-37-38-46';
    tecladoEspecial = false;

    for (const i in especiales) {
        if (key === especiales[i]) tecladoEspecial = true;
    }

    if (numeros.indexOf(teclado) === -1 && !tecladoEspecial) return false;
}

function solonumerosYPunto(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    numeros = '0123456789.';
    especiales = '8-37-38-46';
    tecladoEspecial = false;

    for (const i in especiales) {
        if (key === especiales[i]) tecladoEspecial = true;
    }

    if (numeros.indexOf(teclado) === -1 && !tecladoEspecial) return false;
}