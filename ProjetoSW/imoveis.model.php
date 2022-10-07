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
    private $fotoA;
    private $sexo;
    private $mas;
    private $fem;
    private $mista;
    private $p2;
    private $p3;
    private $p4;
    private $usuario;
    private $senha;
    private $id_usuario;
    private $id_usuario_i;



    
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
