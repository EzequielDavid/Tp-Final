let login=document.getElementById("login");
if(login)
{
  login.addEventListener("click",()=>
  {
    let content = document.getElementById("login-despegable");

    if(content.style.display=="block")
    {
      content.style.display="none";
    }
    else{
      content.style.display="block";
    }
  });
}
let sesion=document.getElementById("sesion");
if(sesion)
{
  sesion.addEventListener("click",()=>
  {
    var  usuario = document.getElementById("usuario");

    if(usuario.innerHTML != null)
    {
      document.getElementById("navbar").style.display = "block";

    }
  });
}
