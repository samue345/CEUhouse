window.onload=function(){
var per=document.querySelector("#per");
var fil=document.querySelector("#filtro");
function perfil(){
login.className="caixa-login";  
   
}

document.addEventListener('click', function(e) {
    if (!per.contains(e.target)) 
    {
        login.className = "caixa-login-some";
    }
});


function filtro(){

    window.open("filtro.php", "self", "width=750, height=800");

}

per.addEventListener("click", perfil);
fil.addEventListener("click", filtro);





}
