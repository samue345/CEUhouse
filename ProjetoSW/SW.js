window.onload=function(){
 var fil= document.querySelector("#filtro");
var per=document.getElementById("per");


function perfil(){
login.className="caixa-login";  
   
}
function apaga(){
    login.className="caixa-login-some"
}
function filtro(){

    window.open("filtro.html", "self", "width=750, height=800");

}

per.addEventListener("mouseover", perfil);
per.addEventListener("mouseleave", apaga);
fil.addEventListener("click", filtro);


}
