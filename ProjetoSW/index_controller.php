<?php
session_start();

require "conexao.php";
require "imoveis.service.php";
require "imoveis.model.php";


$imoveis = new Imoveis();

if (isset($_FILES['fotos'])) {

    $arquivo = $_FILES['fotos'];
    $pasta = 'images/myfotos/';
    if ($arquivo['error'])
        die("falha ao enviar arquivo");

    $nomeAr = $arquivo['name'];
    $novoNome = uniqid();
    $extensao = strtolower(pathinfo($nomeAr, PATHINFO_EXTENSION));

    if ($extensao == 'png' || $extensao == 'jpeg' || $extensao == 'jpg') {
        $path = $pasta . $novoNome . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);

        if ($deu_certo) {
            echo $path;
            $imoveis->__set("fotos", $path);
            $imoveis->__set("nomeFoto", $nomeAr);
            $conexao = new Conexao();
            $imoveisService = new imoveisService($conexao, $imoveis);
            $imoveisService->criarfoto();
            header("location: foto.php");
        }
    }
    else
    {
        header("location: foto.php?certo=0");
    }
} else {
    echo "aruqivo não existe";
}
