window.onload=function(){
var perfil=document.getElementById("per")


function perfill(){
window.open("login.html", "_self")   
   
}

function per(){
    perfil.style.background= "rgba(000, 000, 000, 0.6)"
}
function pern(){
    perfil.style.background="";
}

perfil.addEventListener("click", perfill);
perfil.addEventListener("mouseover", per);
perfil.addEventListener("mouseleave", pern);

}