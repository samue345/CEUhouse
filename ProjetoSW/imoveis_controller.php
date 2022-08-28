<?php
require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";
echo "<pre>";
print_r($_POST);
echo"<pre/>";

$imoveis= new Imoveis();
$imoveis->__set("nome_anfitriao", $_POST['nome']);
$imoveis->__set("apartamento", $_POST['apar']);


$conexao= new Conexao();
$imoveisService= new imoveisService($conexao, $imoveis);
echo "<pre>";
print_r($imoveisService);
echo"</pre>";





?>