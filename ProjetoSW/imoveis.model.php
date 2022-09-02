<?php
class Imoveis
{
    private $matricula;
    private  $id_matricula;
    private  $apto;
    private $nome_anfitriao;
    private $bloco;
    private $numero_de_pessoas;
    private $fotos;
    private $nomeFoto;
    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo=$valor;
    }
}




?>