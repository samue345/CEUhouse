
<?php
 class Conexao
 {
    private $host='localhost';
    private  $usuario='root';
    private $dbname='republicas';
    private $senha='';

    public function conectar()
    {
        try
        {

              $this->cone = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->usuario", "$this->senha");

              return $this->cone;

        }
        catch(PDOException $e)
        {
          echo "erro". $e->getCode(). "message". $e->getMessage(); 
        } 
        

    }

}

?>