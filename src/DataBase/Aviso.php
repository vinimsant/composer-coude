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

        public function deletar_aviso($id){
            try{
                $sql = "DELETE FROM avisos WHERE id_aviso = :id";
                $smt = $this->con->prepare($sql);
                $smt->bindValue(":id", $id);
                $smt->execute();

            }catch(PDOException $e){
                echo "Erro ao deletar aviso. <br> Erro = $e";
            }
        }

        public function editar_aviso($ob_aviso){
            $objeto_aviso = new AvisoProcess\Aviso;
            $objeto_aviso = $ob_aviso;
            $id = $objeto_aviso->__get("id_aviso");
            $titulo = $objeto_aviso->__get("titulo_aviso");
            $aviso = $objeto_aviso->__get("aviso");
            try{
                $sql = "UPDATE avisos SET titulo_aviso = :titulo, aviso = :aviso WHERE id_aviso = :id";
                $smt = $this->con->prepare($sql);
                $smt->bindValue(":id", $id);
                $smt->bindValue(":titulo", $titulo);
                $smt->bindValue(":aviso", $aviso);
                $smt->execute();

            }catch(PDOException $e){
                echo "Erro ao editar aviso. <br> Erro = $e";
            }
        }
    }
    

    

    

    
