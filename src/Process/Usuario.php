<?php
    namespace src\Process\Usuario;

    class Usuario{
        private $id_usuario;
        private $nome_usuario;
        private $senha_usuario;

        public function __get($name){
            switch($name){
                case "id_usuario":
                    return $this->id_usuario;
                case "nome_usario":
                    return $this->nome_usuario;
                case "senha_usuario":
                    return $this->senha_usuario;
            }
        }

        public function __set($name, $value){
            switch($name){
                case "id_usuario":
                    $this->id_usuario = $value;
                    break;
                case "nome_usario":
                    $this->nome_usuario = $value;
                    break;
                case "senha_usuario":
                    $this->senha_usuario = $value;
                    break;
            }
        }
    }