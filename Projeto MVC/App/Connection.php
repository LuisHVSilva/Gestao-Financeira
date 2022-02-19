<?php
    namespace App;

//Criando classe para conexão com o banco de dados.
class Connection{        
    
    //Criando métodos públicos para crud
    public static function getDb(){

        $host = "localhost:3312";
        $dbname = "gestao_gastos;charset=utf8";
        $user = "root";
        $pass = "";    

        try{
            $conexao = new \PDO(
                "mysql:host=".$host.";dbname=".$dbname,
                $user,
                $pass
            );

            return $conexao;

        }catch(\PDOException $e){
            echo '<p>' .$e->getMessage().'</p>';
        };
    }
};

?>
