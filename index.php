<?php
namespace index;

use src\DataBase\Aviso as AvisoDB;
use src\DataBase\Usuario\Usuario as UsuarioDB;

require_once 'src/DataBase/Aviso.php';
require_once 'src/DataBase/Usuario.php';

//pesquisar avisos
$daoA = new AvisoDB\Aviso;
$avisos = $daoA->pesquisar_todos_avisos();

//pesquisar usarios
$daoU = new UsuarioDB();
$usarios = $daoU->pesquisar_todos_usuarios();





?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mural de Avisos</title>
</head>
<body>
    <div class="cabecalho">
        <nav>          
            <?php
            //verificar se tem usuario cadastrado no banco
             if(count($usarios)!= 0){
                echo '<a href="v/usuarios/login.php">Login</a>';
            }else{
                echo '<a href="v/usuarios/cadastro.php">Cadastrar Usuario</a>';
            } ?>
        </nav>
    </div>
    <div class="busca">
        <?php //for para percorer a busca
            foreach($avisos as $aviso){
                $titulo = $aviso['titulo_aviso'];
                $id = $aviso['id_aviso'];
                $descricao = $aviso['aviso'];
                echo "<div class='aviso'><p>$id</p><p>$titulo</p><p>$descricao</p></p></div>";
            }

        ?>
    </div>
    
</body>
</html>