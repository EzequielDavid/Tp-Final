let login = document.getElementById("login");
if (login) {
    login.addEventListener("click", () => {
        let content = document.getElementById("login-despegable");

        if (content.style.display == "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}

function inicioSesion() {
    var usuario = document.getElementById("name");

    var barra = document.getElementById("barra");

    if (usuario != null) {
        if (barra.style.display == "block" || barra.style.display == "") {
            barra.classList.remove("w3-show");
            barra.classList.add("w3-hide");
        }
    }
}





