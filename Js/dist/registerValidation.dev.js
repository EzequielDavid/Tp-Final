"use strict";

window.onload;
{
  var validate = function validate() {
    var styleTrue = "3px solid green";
    var styleFalse = "3px solid #cf0606";
    var fechaActual = new Date();
    var response = 0;

    if (name.value) {
      name.style.borderBottom = styleTrue;
      nameError.style.display = "none";
      response++;
    } else {
      name.style.borderBottom = styleFalse;
      nameError.style.display = "block";
    }

    if (lastName.value) {
      lastName.style.borderBottom = styleTrue;
      lastNameError.style.display = "none";
      response++;
    } else {
      lastName.style.borderBottom = styleFalse;
      lastNameError.style.display = "block";
    }

    if (email.value) {
      email.style.borderBottom = styleTrue;
      emailError.style.display = "none";
      response++;
    } else {
      email.style.borderBottom = styleFalse;
      emailError.style.display = "block";
    }

    if (password.value.length >= 8) {
      password.style.borderBottom = styleTrue;
      passwordError.style.display = "none";
      response++;
    } else {
      password.style.borderBottom = styleFalse;
      passwordError.style.display = "block";
    }

    if (confirmPassword.value == password.value) {
      confirmPassword.style.borderBottom = styleTrue;
      confirmPasswordError.style.display = "none";
      response++;
    } else {
      confirmPassword.style.borderBottom = styleFalse;
      confirmPasswordError.style.display = "block";
    }

    var edad = fechaActual.getFullYear() - parseInt(birth.value);

    if (edad >= 18) {
      birth.style.borderBottom = styleTrue;
      birthError.style.display = "none";
      response++;
    } else {
      birth.style.borderBottom = styleFalse;
      birthError.style.display = "block";
    }

    if (dni.value.length >= 8) {
      dni.style.borderBottom = styleTrue;
      dniError.style.display = "none";
      response++;
    } else {
      dni.style.borderBottom = styleFalse;
      dniError.style.display = "block";
    }

    if (response < 7) {
      return false;
    } else {
      return true;
    }
  };

  //inputs
  var name = document.getElementById('name');
  var lastName = document.getElementById('lastName');
  var email = document.getElementById('email');
  var password = document.getElementById('password');
  var confirmPassword = document.getElementById('confirmPassword');
  var birth = document.getElementById('birth');
  var dni = document.getElementById('dni'); //errors

  var nameError = document.getElementById('nameError');
  var lastNameError = document.getElementById('lastNameError');
  var emailError = document.getElementById('emailError');
  var passwordError = document.getElementById('passwordError');
  var confirmPasswordError = document.getElementById('confirmPasswordError');
  var birthError = document.getElementById('birthError');
  var dniError = document.getElementById('dniError');
}