"use strict";

var login = document.getElementById("login");

if (login) {
  login.addEventListener("click", function () {
    var content = document.getElementById("login-despegable");

    if (content.style.display == "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}