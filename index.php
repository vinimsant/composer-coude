<?php
namespace index;

use src\DataBase\Aviso;

require_once 'src/DataBase/Aviso.php';

$daoA = new Aviso\Aviso;
$avisos = $daoA->pesquisar_todos_avisos();




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
            <a href=""></a>
        </nav>
    </div>
    <div class="busca">
        <?php //for para percorer a busca
            foreach($avisos as $aviso){
                $titulo = $aviso['titulo_aviso'];
                $id = $aviso['id_aviso'];
                $descricao = $aviso['aviso'];
                echo "<p class='aviso'>$id <br>$titulo <br>$descricao <br></p>";
            }

        ?>
    </div>
    
</body>
</html>