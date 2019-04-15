<?php require_once("../../conexao/conexao.php"); ?>

<?php
    //Consulta produtos no banco de dados
    $consultaProdutos = "Select produtoid, nomeproduto, tempoentrega, precounitario, imagempequena
                        from produtos";
    
    $produtos = mysqli_query($conecta, $consultaProdutos);
    if(!$produtos){
        die("Falha na consulta ao banco");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php")?>
        
        <main> 
            <div id="listagem_produtos"> 
                <?php 
                    while($linha = mysqli_fetch_assoc($produtos)){
                ?>
                    <ul>
                        <li class="imagem"><img src="<?php echo $linha["imagempequena"]?>"> </li>
                        <li><h3><?php echo $linha["nomeproduto"] ?></h3> </li>
                        <li>Temnpo Entrega: <?php echo $linha["tempoentrega"] ?></li>
                        <li>Pre&ccedil;o unit&aacute;rio: <?php echo  $linha["precounitario"] ?></li>
                    </ul>
                    

                <?php } ?>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php")?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>