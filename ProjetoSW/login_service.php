<?php

class loginService
{
    private  $conexao;
    private $imoveis;
    public function __construct(Conexao $conexao, Imoveis $imoveis)
    {

        $this->conexao = $conexao->conectar();
        $this->imoveis = $imoveis;
    }

    public function criarlogin()
    {

        $query = "insert into login(login, senha) values(:usu, :se)";
        $smt = $this->conexao->prepare($query);
        $smt->bindValue(':usu', $this->imoveis->__get('usuario'));
        $smt->bindValue(':se', $this->imoveis->__get('senha'));
        $smt->execute();
    }
    public function recuperar()
    {
      $query='select * from login';
      $smt= $this->conexao->query($query);
      return $smt->fetchall(PDO::FETCH_OBJ);
    }

    public function recuperarCadastro($email, $senha)
    {
       
        $query='select id_usuario from login WHERE login= :lo AND senha = :sen';
        $smt = $this->conexao->prepare($query);
        $smt->bindValue(':lo', $email);
        $smt->bindValue(':sen', $senha);
        $smt->execute();        
        return $smt->fetchall(PDO::FETCH_ASSOC);
  
    }

}
