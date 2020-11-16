
window.onload
{
    //inputs
let name = document.getElementById('name');
let lastName = document.getElementById('lastName');
let email = document.getElementById('email');
let password = document.getElementById('password');
let confirmPassword = document.getElementById('confirmPassword');
let birth = document.getElementById('birth');
let dni = document.getElementById('dni');

//errors
let nameError = document.getElementById('nameError');
let lastNameError = document.getElementById('lastNameError');
let emailError = document.getElementById('emailError');
let passwordError = document.getElementById('passwordError');
let confirmPasswordError = document.getElementById('confirmPasswordError');
let birthError = document.getElementById('birthError');
let dniError = document.getElementById('dniError');


function validate()
{
    let styleTrue="3px solid green";
    let styleFalse="3px solid #cf0606";
    let fechaActual = new Date();
    let response = 0;

    if(name.value)
    {
      name.style.borderBottom = styleTrue;
      nameError.style.display="none";
      response++;
    }
    else
    {
        name.style.borderBottom = styleFalse;
        nameError.style.display="block";
    }

     if(lastName.value)
    {
        lastName.style.borderBottom = styleTrue;
        lastNameError.style.display="none";
        response++;
   
    }
     else
    {
        lastName.style.borderBottom = styleFalse;
        lastNameError.style.display = "block";
    }
    if(email.value)
    {
        email.style.borderBottom = styleTrue;
        emailError.style.display="none";
        response++;

    }
     else
    {
        email.style.borderBottom = styleFalse;
        emailError.style.display = "block";
    }
    if(password.value.length>=8)
    {
        password.style.borderBottom = styleTrue;
        passwordError.style.display="none";
        response++;

    }
     else
    {
        password.style.borderBottom = styleFalse;
        passwordError.style.display = "block";
    }
    if(confirmPassword.value ==password.value)
    {
        confirmPassword.style.borderBottom = styleTrue;
        confirmPasswordError.style.display="none";
        response++;

    }
     else
    {
        confirmPassword.style.borderBottom = styleFalse;
        confirmPasswordError.style.display = "block";
    }

    let edad=fechaActual.getFullYear()-(parseInt(birth.value));
    if( edad >= 18)
    {
        birth.style.borderBottom = styleTrue;
        birthError.style.display="none";
        response++;

    }
     else
    {
        birth.style.borderBottom = styleFalse;
        birthError.style.display = "block";
    }

     if(dni.value.length>=8)
    {
        dni.style.borderBottom = styleTrue;
        dniError.style.display="none";
        response++;

    }
     else
    {
        dni.style.borderBottom = styleFalse;
        dniError.style.display = "block";
        
    }  
    
    if(response<7)
    {
        return false;
    }
    else
    {
        return true;
    }
    
}

}


document.getElementById("licencia").style.display="none";
function elegirRol()
{

    if(document.getElementById("rol").value === "4")
    {
        document.getElementById("licencia").style.display="block";

    }
    if(document.getElementById("rol").value === "2" || document.getElementById("rol").value === "" || document.getElementById("rol").value === "3")
    {

        document.getElementById("licencia").style.display="none";
    }
}




