<?php
class imoveisService
{
  private  $conexao;
  private $imoveis;
  public function __construct(Conexao $conexao, Imoveis $imoveis)
  {

    $this->conexao = $conexao->conectar();
    $this->imoveis = $imoveis;
  }

  public function criar()
  {
    $query = "insert into info_m(apartamento, nome_anfitriao, matricula, bloco, numero_de_pessoas, sexo, f_id_usuario) values(:re, :nome_a, :mat, :blo, :nupe, :s, :usu)";


    $smt = $this->conexao->prepare($query);

    $smt->bindValue(':nome_a', $this->imoveis->__get('nome_anfitriao'));
    $smt->bindValue(':re', $this->imoveis->__get('apto'));
    $smt->bindValue(':mat', $this->imoveis->__get('matricula'));
    $smt->bindValue(':blo', $this->imoveis->__get('bloco'));
    $smt->bindValue(':nupe', $this->imoveis->__get('numero_de_pessoas'));
    $smt->bindValue(':s', $this->imoveis->__get('sexo'));
    $smt->bindValue(':usu', $this->imoveis->__get('id_usuario'));
    $smt->execute();
    $id = $this->conexao->lastInsertId();
    $_SESSION['id'] = $id;
  }


  public function criarfoto()
  {


    $query = "insert into images(id_imagem, imagens, nomes, id_usuarioI) values(:id, :p, :f, :us)";
    $smt = $this->conexao->prepare($query);
    $query2 = 'select id_matricula from info_m';
    $smtt = $this->conexao->prepare($query2);
    $smt->bindValue(':id', $_SESSION['id']);
    $smt->bindValue(':p', $this->imoveis->__get('fotos'));
    $smt->bindValue(':f', $this->imoveis->__get('nomeFoto'));
    $smt->bindValue(':us', $this->imoveis->__get('id_usuario_i'));
    $smt->execute();
  }
  public function recuperar()
  {

    if ($_SESSION['filtro'] == 1) {
      if ($_SESSION['m'] != '' && $_SESSION['fi'] == '' && $_SESSION['mi'] == '') {
        $query = "SELECT * FROM info_m WHERE sexo = 'masculina'";
        $smt = $this->conexao->query($query);
        return $smt->fetchall(PDO::FETCH_OBJ);
      }
      if ($_SESSION['m'] == '' && $_SESSION['fi'] != '' && $_SESSION['mi'] == '') {
        $query = "SELECT * FROM info_m WHERE sexo = 'feminina'";
        $smt = $this->conexao->query($query);
        return $smt->fetchall(PDO::FETCH_OBJ);
      }
      if ($_SESSION['mi'] != '' && $_SESSION['m'] == '' && $_SESSION['fi'] == '') {
        $query = "SELECT * FROM info_m WHERE sexo = 'mista'";
        $smt = $this->conexao->query($query);
        return $smt->fetchall(PDO::FETCH_OBJ);
      }
      if ($_SESSION['m'] != ''  && $_SESSION['fi'] != '' && $_SESSION['mi'] == '') {
        $query = "SELECT * FROM info_m WHERE sexo = 'feminina' OR sexo='masculina'";
        $smt = $this->conexao->query($query);
        return $smt->fetchall(PDO::FETCH_OBJ);
      }
      if ($_SESSION['m'] != ''  && $_SESSION['fi'] == '' && $_SESSION['mi'] != '') {
        $query = "SELECT * FROM info_m WHERE sexo = 'mista' OR sexo='masculina'";
        $smt = $this->conexao->query($query);
        return $smt->fetchall(PDO::FETCH_OBJ);
      }
      if ($_SESSION['m'] == ''  && $_SESSION['fi'] != '' && $_SESSION['mi'] != '') {
        $query = "SELECT * FROM info_m WHERE sexo = 'mista' OR sexo='feminina'";
        $smt = $this->conexao->query($query);
        return $smt->fetchall(PDO::FETCH_OBJ);
      }
      if ($_SESSION['m'] != ''  && $_SESSION['fi'] != '' && $_SESSION['mi'] != '') {
        $query = "SELECT * FROM info_m WHERE sexo = 'mista' OR sexo='feminina' OR sexo='masculina'";
        $smt = $this->conexao->query($query);
        return $smt->fetchall(PDO::FETCH_OBJ);
      }
    } 
    else 
    {
      $query = 'select * from info_m';
      $smt = $this->conexao->query($query);
      return $smt->fetchall(PDO::FETCH_OBJ);
    }
  }
  public function recuperarfoto()
  {
    $query = 'select * from info_m inner join images on(info_m.id_matricula = id_imagem)';
    $smt = $this->conexao->query($query);
    return $smt->fetchall(PDO::FETCH_OBJ);
  }
  public function recuperar2($id2)
  {
    $query = "SELECT * FROM info_m INNER JOIN images ON (info_m.id_matricula = id_imagem) WHERE id_matricula = $id2 ";
    $smt = $this->conexao->query($query);
    return $smt->fetchall(PDO::FETCH_OBJ);
  }
  public function recuperar3($id2)
  {
    $query="SELECT * FROM login INNER JOIN info_m on(login.id_usuario = $id2) join images ON(login.id_usuario = $id2)";
    $smt = $this->conexao->query($query);
    return $smt->fetchall(PDO::FETCH_OBJ);

  }
  public function recuperarin($usu)
  {
    $query = "SELECT * FROM info_m WHERE id_usuario = $usu";
    $smt = $this->conexao->query($query);
    return $smt->fetchall(PDO::FETCH_OBJ);
  }

  public function atualizar()
  {
  }
  public function deletar()
  {
  }
}
