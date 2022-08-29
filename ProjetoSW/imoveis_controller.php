<?php
session_start();

require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";
if(isset($_GET['acao']))
{
    $acao= $_GET['acao'];
}

if ($acao == 'inserir') 
{
    $imoveis = new Imoveis();
    $imoveis->__set("nome_anfitriao", $_POST['nome_anfitriao']);
    $imoveis->__set("apto", $_POST['apar']);
    $imoveis->__set("matricula", $_POST['matricula']);
    $imoveis->__set("bloco", $_POST['bloco']);
    $imoveis->__set("numero_de_pessoas", $_POST['numero_de_pessoas']);


    $conexao = new Conexao();
    $imoveisService = new imoveisService($conexao, $imoveis);
    $imoveisService->criar();
    header("location: anun.php?criou=1");
}
else if($acao=='recuperar')
{
    $imoveis= new Imoveis();
    $conexao = new Conexao();
    $imoveisService = new imoveisService($conexao, $imoveis);
    $tarefas=$imoveisService->recuperar();

}

/*echo '<br/>';
echo $tarefa->apartamento;
echo '<br/>';
echo $tarefa->numero_de_pessoas;
echo '<br/>';
echo $tarefa->matricula;
echo '<br/>';
echo $tarefa->id_matricula;
echo '<br/>';
echo $tarefa->nome_anfitriao;
echo '<br/>';
*/

