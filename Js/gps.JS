function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);

    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

document.getElementById("botonGps").style.display = "none";
function showPosition(position) {
    limpiarCambios();

    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    const latitud = lat.toString();
    const longitud = lon.toString();
    document.getElementById("lo").value = position.coords.latitude;
    document.getElementById("la").value= position.coords.longitude;
    document.getElementById("caluclo").className ="w3-btn w3-margin w3-green";
    document.getElementById("botonGps").className ="w3-btn w3-red";
    document.getElementById("enviado").innerHTML+="<p class='posicion'><b>Posicion calculada</b></p>";
    document.getElementById("botonGps").style.display = "block";
    document.getElementById("enviado").innerHTML+="<p class='posicion'><b>Latitud: </b>"+latitud+"</p>";
    document.getElementById("enviado").innerHTML+="<p class='posicion'><b>Longitud: </b>"+longitud+"</p>";


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
    let map, infoWindow;
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 6,
    });
    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
}

function limpiarCambios(){
    document.getElementById("enviado").innerHTML="";
}

let map, infoWindow;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 6,
    });
    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}