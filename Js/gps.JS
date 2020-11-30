
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);

    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {


    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    const latitud = lat.toString();
    const longitud = lon.toString();
    document.getElementById("lo").value = longitud;
    document.getElementById("la").value= latitud;
    document.getElementById("caluclo").className ="w3-btn w3-padding w3-green";
    document.getElementById("botonGps").className ="w3-btn w3-padding w3-red";
    document.getElementById("enviado").innerHTML="Posicion calculada";
    alert(latitud);
 /*   var data = new FormData();
    data.append("longitud", longitud);
    data.append("latitud", latitud);
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "index.php?module=chofer&action=enviarPosicionGps", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onload = function () {
        // do something to response
        console.log(this.responseText);
    };
    alert(latitud);
   xhttp.send(data);
   window.location.href = "index.php?module=inicio&action=execute";*/
}