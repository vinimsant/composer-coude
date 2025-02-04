<?php 
    namespace src\DataBase\Aviso;

use PDOException;
use  src\Process\Aviso as AvisoProcess;
    use src\DataBase\Conexao as conexao;
    

    require_once 'src/Process/Aviso.php';
    require_once 'Conexao.php';



    class Aviso{

        private $con;

        public function __construct(){
            $conexao = new conexao\Conexao;
            $this->con = $conexao->conectar();
        }
        public function inserir_aviso($avi){

            try{
                $aviso = new AvisoProcess\Aviso;
                $aviso = $avi;
        
                $titulo = $aviso->__get("titulo_aviso");
                $avisoD = $aviso->__get("aviso");
        
                $smt = $this->con->prepare("INSERT INTO avisos (titulo_aviso, aviso) values(:titulo, :aviso)");
                $smt->bindParam(":titulo", $titulo);
                $smt->bindParam(":aviso", $avisoD);
        
                $smt->execute();
            }catch(PDOException $e){
                echo "Erro ao inserir avisos $e";
            }
                
        }

        public function pesquisar_todos_avisos(){

            try{
                $sql = "SELECT * FROM avisos";
                $stmt = $this->con->prepare($sql);
                $stmt->execute();
                $dados = $stmt->fetchAll();
                return $dados;
            }catch(\PDOException $e){
                echo "Erro ao pesquisar avisos $e";
                return null;
            }

        }
    }
    

    

    

    
