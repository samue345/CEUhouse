<?php
class imoveisService
{
    private $conexao;
    private $imoveis;
    public function __construct(Conexao $conexao, Imoveis $imoveis)
    {
        $this->conexao=$conexao->conectar();
        $this->imoveis=$imoveis;
    }

    public function criar()
    {
        
    } 
    public function recuperar()
    {

    }
    public function atualizar()
    {

    }
    public function deletar()
    {


    }
}







?>