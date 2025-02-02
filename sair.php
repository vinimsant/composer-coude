<?php
namespace sair;

class Sair{
    public function sair(){
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
    }
}
    