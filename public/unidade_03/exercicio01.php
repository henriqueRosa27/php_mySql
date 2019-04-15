<?php
    require_once("../../conexao/conexao.php");
?>

<?php 
    //Passo 3 - Abrir consulta no banco de dados

    $consultaCategoria = "select * from categorias";
    $categorias = mysqli_query($conecta, $consultaCategoria);

    if(!$categorias){
        die("Falha na conulta ao banco.");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
    </head>

    <body>

        <ul>
        <?php
            //Passo 4 - Listagem dos dados
            while($registro = mysqli_fetch_assoc($categorias)){

                echo "<li>" . $registro["nomecategoria"] . "</li>";
            }
        ?>
        </ul>

        <?php 
            //Passo 5 - Liberar dados da memória
            mysqli_free_result($categorias);
        ?>

    </body>
</html>

<?php
    //Passo 6 - Fechar Conexão
    mysqli_close($conecta);
?>