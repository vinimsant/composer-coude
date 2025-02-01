<?php

    namespace composer\src\DataBase\Aviso;
    
    use Conexao;

   

    class Aviso{

        

        public function inserir_aviso(){

            $conexao = new Conexao();
            $con = $conexao->conectar();
            $smt = $con->prepare("INSERT INTO avisos (titulo, aviso) values(:titulo, :aviso)");
            $smt->bindParam(":titulo", );
            $smt->bindParam(":aviso", )
            
        }
        
        
    }
