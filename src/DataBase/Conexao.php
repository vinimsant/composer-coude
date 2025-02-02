<?php


class Conexao{
    public function conectar(){
        $con = null;
        $host = "localhost";
        $banco = "muraldedeavisos";
        $senha = "";
        $usuario = "root";

        try{
            $con = new PDO("mysql:host={$host};dbname={$banco}",$usuario, $senha);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        }catch(PDOException $e){
            echo "Exeção".$e->getMessage();
        }
        return $con;
    }
}

?>