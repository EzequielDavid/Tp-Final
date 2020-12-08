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

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}







