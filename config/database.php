<?php

class Database{
    public $conexao;

    public function getConnection(){
        try {
            $conexao = new PDO("mysql:host=localhost;port=3306;dbname=dbclinica","root","");
            $conexao->exec("set name uft8");
        }catch(PDOException $e){
            echo "Erro ao estabelecer a conexão com o banco de dados. ".$e->getmessage();
        }
        return $conexao;
    }
}

?>
