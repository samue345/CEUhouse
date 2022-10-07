<?php
session_start();


require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";
require "login_service.php";


if (isset($_GET['acao'])) 
{
    $acao = $_GET['acao'];
}

if (isset($_GET['filtro']) && $_GET['filtro'] == 1) 
{
    $filtro = $_GET['filtro'];
}

if ($acao == 'inserir') 
{
   echo $_SESSION['id-usu'];
    $imoveis = new Imoveis();
    $imoveis->__set("nome_anfitriao", $_POST['nome_anfitriao']);
    $imoveis->__set("apto", $_POST['apar']);
    $imoveis->__set("matricula", $_POST['matricula']);
    $imoveis->__set("bloco", $_POST['bloco']);
    $imoveis->__set("numero_de_pessoas", $_POST['numero_de_pessoas']);
    $imoveis->__set("sexo", $_POST['sexo']);
    $imoveis->__set("id_usuario", $_SESSION['id-usu']);

    $conexao = new Conexao();
    $imoveisService = new imoveisService($conexao, $imoveis);
    $imoveisService->criar();
    header("location: foto.php?id");
} 
else if ($acao == 'recuperar') 
{
    $conexao = new Conexao();
    $imoveis = new Imoveis();
    $imoveisService = new imoveisService($conexao, $imoveis);
    $tarefas = $imoveisService->recuperar();
    $tarefas2 = $imoveisService->recuperarfoto();


} 
else if ($acao == 'inserir2') 
{
    $imoveis = new Imoveis();

    if(isset($_POST['sexo'])) 
    {

        $_SESSION['filtro'] = $_GET['filtro'];
            echo '<pre>';
            print_r($_POST);
            echo '<pre/>';

            if(isset($_POST['sexo']['masculino']))
            {
                $_SESSION['m']= $_POST['sexo']['masculino'];
   
            }
            if(!isset($_POST['sexo']['masculino']))
            {
                $_SESSION['m']='';
            }
            if(isset($_POST['sexo']['feminino']))
            {
                $_SESSION['fi']= $_POST['sexo']['feminino'];
                echo $_SESSION['fi'];
   
            }
            if(!isset($_POST['sexo']['feminino']))
            {
                $_SESSION['fi']='';
            }
            if(isset($_POST['sexo']['misto']))
            {
                $_SESSION['mi']= $_POST['sexo']['misto'];
   
            }
            if(!isset($_POST['sexo']['misto']))
            {
                $_SESSION['mi']='';
            }
      

    } 
    else 
    {
        $_SESSION['filtro'] = 0;
        $_SESSION['m']='';
        $_SESSION['mi']='';
        $_SESSION['fi']='';

    }
}
if($acao=='usuario')
{
    $conexao = new Conexao();
    $imoveis = new Imoveis();
    $loginService = new loginService($conexao, $imoveis);
    $autenticados= $loginService->recuperar();
    foreach($autenticados as $key => $autenticado)
        if($autenticado->login == $_POST['email-u'])
        {            
            $_SESSION['autenticado']='nao';
            header("location: cadastrar.php?existe=1");
            die();
        }
      
    $imoveis->__set("usuario", $_POST['email-u']);
    $imoveis->__set("senha", $_POST['senha-u']);
    $_SESSION['login-u']= $_POST['email-u'];
    $_SESSION['senha-u'] = $_POST['senha-u'];
    $_SESSION['autenticado']='sim';
    $tarefas = $loginService->criarlogin();
    $tarefas2= $loginService->recuperarCadastro($_POST['email-u'], $_POST['senha-u']);
    $autenticado= $tarefas2[0]['id_usuario'];
    $_SESSION['id-usu'] = $autenticado;
    header("location: index.php?cadastrado=1");


    
}
if($acao=='logar')
{
 
        $conexao = new Conexao();
        $imoveis = new Imoveis();
        $loginService = new loginService($conexao, $imoveis);
        $autenticados= $loginService->recuperar();
       
        foreach($autenticados as $key => $autenticado)
        {
                if($_POST['email']== $autenticado->login && $autenticado->senha == $_POST['senha'])
                {
                 $_SESSION['id-usu'] = $autenticado->id_usuario;
                  $auten=true;
                }
        }
           
        if($auten == true)
        {
         
            $_SESSION['autenticado']='sim';
            echo $_SESSION['login-u']= $_POST['email'];
            echo $_SESSION['senha-u'] = $_POST['senha'];
           header("location: index.php?logado=1");
        }
        else
        {
            $_SESSION['autenticado']='nao';
            echo $_SESSION['autenticado'];
            header("location: login.php?logado=0");

        }

}
