<?php 
class Conexao {
    private $host = 'localhost';
    private $db = 'php_com_pdo';
    private $user = 'root';
    private $pass = '';
    public function conctar(){
        try {
           $conexao = new PDO(
            "mysql:host=$this->host;dbname=$this->db",
            "$this->user",
            "$this->pass"
           );

           return $conexao;
           
        } catch (PDOException $e){
           echo $e->getMessage(); 

        }

    }
}    
?>