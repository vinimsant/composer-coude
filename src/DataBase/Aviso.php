<?php 

    

    use src\Process\Aviso\Aviso as Aviso_Process;

    use src\Process\Usuario as Usuario_Process;  

    require_once '../Process/Aviso.php';



    function inserir_aviso($aviso){

        foreach($aviso as $av){
            $avisi = new Aviso_Process;
            $avisi = $av;
            $titulo = $avisi->__get("titulo_aviso");
            $aviso = $avisi->__get("aviso");
            $conector = new Conexao();

            
            $con = $conector->conectar();
            $smt = $con->prepare("INSERT INTO avisos (titulo_aviso, aviso) values(:titulo, :aviso)");
            $smt->bindParam(":titulo", $titulo);
            $smt->bindParam(":aviso", $aviso);

            $smt->execute();
        }
            
    }

    $aviso = new Aviso_Process;
    $aviso->__set("titulo_aviso", "teste avi");
    $aviso->__set("aviso", "teste avi");
    inserir_aviso($aviso);

    

    
