
<?php
 class Conexao
 {
    private $host='localhost';
    private  $usuario='root';
    private $senha='';

    public function conectar()
    {
        try
        {
          $cone = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->usuario", "$this->senha");
          return $cone;
      
        }
        catch(PDOException $e)
        {
          echo "erro". $e->getCode(). "message". $e->getMessage(); 
        }  
    }

}

?>