<?php 

    require_once 'Conexao.php'; 
    require_once 'Process/Aviso.php';

    use src\Process\Aviso as Aviso_Process;

    

    class Aviso{

        

        public function inserir_aviso(){

            


            $conector = new Conexao();

            
            $titulo = "teste";
            $aviso = "criando aviso para testar a classe";
            
            $con = $conector->conectar();
            $smt = $con->prepare("INSERT INTO avisos (titulo_aviso, aviso) values(:titulo, :aviso)");
            $smt->bindParam(":titulo", $titulo);
            $smt->bindParam(":aviso", $aviso);

            $smt->execute();
            
        }        
        
    }

    $aviso = new Aviso();
    $aviso->inserir_aviso();
