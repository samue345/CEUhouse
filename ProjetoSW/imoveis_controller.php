<?php
session_start();

require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";

$imoveis= new Imoveis();
$imoveis->__set("nome_anfitriao", $_POST['nome_anfitriao']);
$imoveis->__set("apto", $_POST['apar']);
$imoveis->__set("matricula", $_POST['matricula']);
$imoveis->__set("bloco", $_POST['bloco']);
$imoveis->__set("numero_de_pessoas", $_POST['numero_de_pessoas']);


$conexao= new Conexao();
$imoveisService= new imoveisService($conexao, $imoveis);
$imoveisService->criar();
header("location: anun.php?criou=1");
if($_GET['criou']==1)
{
    $_SESSION['criada']=1;
}





?>