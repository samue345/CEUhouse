<?php
//session_start();
class imoveisService
{
   private  $conexao;
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
        $id = $this->conexao->lastInsertId();
        $_SESSION['id']=$id;
        
    }
    public function criarfoto()
    {
 

        $query="insert into images(id_imagem, imagens, nomes) values(:id, :p, :f)";
        $smt=$this->conexao->prepare($query);
        $query2='select id_matricula from info_m';
        $smtt=$this->conexao->prepare($query2);

        

       $smt->bindValue(':id', 1);
        $smt->bindValue(':p', $this->imoveis->__get('fotos'));
        $smt->bindValue(':f', $this->imoveis->__get('nomeFoto'));

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