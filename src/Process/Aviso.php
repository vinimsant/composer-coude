<?php
namespace src\Process\Aviso;

class Aviso{

    private $id_aviso;
    private $titulo_aviso;
    private $aviso;

    public function __get($name){
        switch ($name)  {
            case "id_aviso":
                return $this->id_aviso;
                break;
            case "titulo_aviso":
                return $this->titulo_aviso;
                break;
            case "aviso":
                return $this->aviso;
                break;
        }
    }

    public function __set($name, $value){
        switch ($name)  {
            case "id_aviso":
                $this->id_aviso = $value;
                break;
            case "titulo_aviso":
                $this->titulo_aviso = $value;
                break;
            case "aviso":
                $this->aviso = $value;
                break;
        }
    }

    
}