<?php
session_start();


require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";


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
    $imoveis = new Imoveis();

    $arquivo = $_FILES['fotoAP'];
    $pasta = 'images/fotoApre/';
    if ($arquivo['error'])
        die("falha ao enviar arquivo");

    $nomeAr = $arquivo['name'];
    $novoNome = uniqid();
    $extensao = strtolower(pathinfo($nomeAr, PATHINFO_EXTENSION));
    $path = $pasta . $novoNome . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
    $imoveis->__set("fotoA", $path);

    $imoveis->__set("nome_anfitriao", $_POST['nome_anfitriao']);
    $imoveis->__set("apto", $_POST['apar']);
    $imoveis->__set("matricula", $_POST['matricula']);
    $imoveis->__set("bloco", $_POST['bloco']);
    $imoveis->__set("numero_de_pessoas", $_POST['numero_de_pessoas']);
    $imoveis->__set("sexo", $_POST['sexo']);

    $conexao = new Conexao();
    $imoveisService = new imoveisService($conexao, $imoveis);
    $imoveisService->criar();
    //header("location: anun.php?criou=1");


    header("location: foto.php");
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

