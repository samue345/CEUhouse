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
        $query="insert into info_m(apartamento, nome_anfitriao, matricula, bloco, numero_de_pessoas) values(:re, :nome_a, :mat, :blo, :nupe)";
        $smt=$this->conexao->prepare($query);
        $smt->bindValue(':nome_a', $this->imoveis->__get('nome_anfitriao'));
        $smt->bindValue(':re', $this->imoveis->__get('apto'));
        $smt->bindValue(':mat', $this->imoveis->__get('matricula'));
        $smt->bindValue(':blo', $this->imoveis->__get('bloco'));
        $smt->bindValue(':nupe', $this->imoveis->__get('numero_de_pessoas'));


        $smt->execute();

        
    } 
    public function recuperar()
    {
      $query='select * from info_m';
      $smt= $this->conexao->query($query);
      return $smt->fetchall(PDO::FETCH_OBJ);

    }
    public function atualizar()
    {

    }
    public function deletar()
    {


    }
}







?>