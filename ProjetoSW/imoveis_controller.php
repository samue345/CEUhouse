<?php
session_start();


require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";


if(isset($_GET['acao']))
{
    $acao= $_GET['acao'];
}
if(isset($_GET['filtro']) && $_GET['filtro']==1)
{
    $filtro=$_GET['filtro'];

}

if ($acao == 'inserir') 
{
    $imoveis = new Imoveis();

         $arquivo=$_FILES['fotoAP'];
         $pasta='images/fotoApre/';
         if($arquivo['error'])
         die("falha ao enviar arquivo");

         $nomeAr=$arquivo['name'];
         $novoNome=uniqid();
         $extensao=strtolower(pathinfo($nomeAr, PATHINFO_EXTENSION));
         $path= $pasta . $novoNome. "." . $extensao;
         $deu_certo=move_uploaded_file($arquivo['tmp_name'], $path);
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

else if($acao=='recuperar')
{
        $conexao = new Conexao();
         $imoveis = new Imoveis();
        $imoveisService = new imoveisService($conexao, $imoveis);
        $tarefas=$imoveisService->recuperar();
        $tarefas2=$imoveisService->recuperarfoto();



}
else if($acao=='inserir2')
{
        $conexao = new Conexao();
         $imoveis = new Imoveis();
         if(isset($_GET['filtro']) && $_GET['filtro']==1)
         {
            $_SESSION['filtro']=$_GET['filtro'];
         }
         else
         {
            $_SESSION['filtro']=0;
         }
        $imoveisService = new imoveisService($conexao, $imoveis);




}

