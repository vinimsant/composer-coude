<?php

namespace src\DataBase\Usuario;

use src\Process\Usuario as Usuario_Process;
use src\DataBase\Conexao as conexao;
use PDOException;

require_once 'src/Process/Usuario.php';
require_once 'Conexao.php';


class Usuario{

    private $con;

    public function __construct(){
        $conexao = new conexao\Conexao;
        $this->con = $conexao->conectar();
    }

    public function inserir_usuario($usu){

        try{
            $usuario = new Usuario_Process\Usuario;
            $usuario = $usu;
    
            $nome = $usuario->__get("nome_usario");
            $senha = $usuario->__get("senha_usuario");
    
            $smt = $this->con->prepare("INSERT INTO usuarios (nome_usuario, senha) values(:nome, :senha)");
            $smt->bindParam(":nome", $nome);
            $smt->bindParam(":senha", $senha);
    
            $smt->execute();
        }catch(PDOException $e){
            echo "Erro ao inserir usuario $e";
        }
            
    }

    public function pesquisar_todos_usuarios(){

        try{
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $dados = $stmt->fetchAll();
            return $dados;
        }catch(PDOException $e){
            echo "Erro ao pesquisar usuarios $e";
            return null;
        }

    }

    public function deletar_usuario($id){
        try{
            $sql = "DELETE FROM usuarios WHERE idusuarios = :id";
            $smt = $this->con->prepare($sql);
            $smt->bindValue(":id", $id);
            $smt->execute();

        }catch(PDOException $e){
            echo "Erro ao deletar usuario. <br> Erro = $e";
        }
    }

    public function editar_usuario($ob_usuario){
        $objeto_usuario = new Usuario_Process\Usuario;
        $objeto_usuario = $ob_usuario;
        $id = $objeto_usuario->__get("id_usuario");
        $nome = $objeto_usuario->__get("nome_usario");
        $senha = $objeto_usuario->__get("senha_usuario");
        try{
            $sql = "UPDATE usuarios SET nome_usuario = :nome, senha = :senha WHERE idusuarios = :id";
            $smt = $this->con->prepare($sql);
            $smt->bindValue(":id", $id);
            $smt->bindValue(":nome", $nome);
            $smt->bindValue(":senha", $senha);
            $smt->execute();

        }catch(PDOException $e){
            echo "Erro ao editar usuario. <br> Erro = $e";
        }
    }

}

