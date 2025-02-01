<?php

namespace composer\src\DataBase\Conexao;

class Conexao{
    public function conectar(){
        $con = null;
        $host = "localhost";
        $banco = "MuralDeAvisos";
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