<?php
class conexao{
    private  $host = 'localhost';
    private  $dbname = 'php_com_pdo';

    private  $user = 'root' ;
    private  $password = '';

    public function conectar(){
        try {

            $con = new PDO("mysql:host=$this->host;
            dbname=$this->dbname",
            "$this->user");

            return $con;

        } catch(Exception $e){
            echo $e->getMessage();
        };

    }
}
?>