<?php
require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";
echo "<pre>";
print_r($_POST);
echo"<pre/>";
$imoveis= new Imoveis();
$imoveis->__set("nome_anfitriao", $_POST['nome_anfitriao']);
$imoveis->__set("apto", $_POST['apar']);
$imoveis->__set("matricula", $_POST['matricula']);
$imoveis->__set("bloco", $_POST['bloco']);
$imoveis->__set("numero_de_pessoas", $_POST['numero_de_pessoas']);


$conexao= new Conexao();
$imoveisService= new imoveisService($conexao, $imoveis);
$imoveisService->criar();






?>