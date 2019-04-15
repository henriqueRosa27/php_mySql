<?php require_once("../../conexao/conexao.php"); ?>

<?php
    if(isset($_GET["codigo"])){
        $produtoId = $_GET["codigo"];
    }
    else{
        Header("Location: inicial.php");
    }


    //Consulta ao banco dados o produto baseado no id recebido na url
    $consultaProduto = "Select *
                        from produtos
                        where produtoid = {$produtoId}";

    $detalhe = mysqli_query($conecta, $consultaProduto);

    //Testar ero
    if(!$detalhe){
        die("Falha na consulta ao banco");
    }
    else{
        $dadosProduto = mysqli_fetch_assoc($detalhe);

        $nomeProduto = $dadosProduto["nomeproduto"];
        $descricao = $dadosProduto["descricao"];
        $codigoBarra = $dadosProduto["codigobarra"];
        $tempoEntrega = $dadosProduto["tempoentrega"];
        $precoRevenda = $dadosProduto["precorevenda"];
        $precoUnitario = $dadosProduto["precounitario"];
        $estoque = $dadosProduto["estoque"];
        $imagemGrande = $dadosProduto["imagemgrande"];
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem"><img src="<?php echo $imagemGrande ?>"></li>
                    <li><h2><?php echo $nomeProduto ?></h2></li>
                    <li><b>Descrição: <?php echo $descricao ?></b></li>
                    <li><b>Código de barras: <?php echo $codigoBarra ?></b></li>
                    <li><b>Tempo Entrega: </b><?php echo "R$ " . number_format($tempoEntrega, 2 , ",", ".") ?></li>
                    <li><b>Preço revenda: </b><?php echo "R$ " . number_format($precoRevenda, 2 , ",", ".") ?></li>
                    <li><b>Preço unitário: </b><?php echo $precoUnitario ?></li>
                    <li><b>Estoque: </b><?php echo $estoque ?></li>
                </ul>
            </div>
            
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>