<?php require_once("../../conexao/conexao.php"); ?>
<?php
    if(isset($_POST["transportadoraID"])){
        $id = $_POST["transportadoraID"];

        $exc = "Delete from transportadoras where transportadoraID = {$id}";

        $del = mysqli_query($conecta, $exc);
        if(!$del){
            die("Erro na exclusão");
        }
        else{
            header("location:listagem.php");
        }
    }


    if(isset($_GET["codigo"])){
        $codigo = $_GET["codigo"];
        $tr = "SELECT *
            FROM TRANSPORTADORAS
            where transportadoraID = {$codigo}";

        $buscaTransportadora = mysqli_query($conecta, $tr);
        if(!$buscaTransportadora){
            die("Erro no banco");
        }

        $infoTransportadora = mysqli_fetch_assoc($buscaTransportadora);

        $estados = "select estadoID, nome
                    from estados";
        $buscaEstados = mysqli_query($conecta, $estados);
        if(!$buscaEstados){
            die("Erro no banco");
        }
        //print_r($infoTransportadora);
    }
    else{
        header("location:listagem.php");
    }
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="janela_formulario">
                <form action="exclusao.php" method="post">
                    <h2>Exclusão  de Transportadoras</h2>

                    <label for="nometransportadora">Nome</label>
                    <input type="text" value="<?php echo utf8_encode($infoTransportadora["nometransportadora"]) ?>" name="nometransportadora" id="nometransportadora">

                    <label for="endereco">Endereco</label>
                    <input type="text" value="<?php echo utf8_encode($infoTransportadora["endereco"]) ?>" name="endereco" id="endereco">

                    <label for="telefone">Telefone</label>
                    <input type="text" value="<?php echo $infoTransportadora["telefone"] ?>" name="telefone" id="telefone">

                    <label for="cidade">Cidade</label>
                    <input type="text" value="<?php echo utf8_encode($infoTransportadora["cidade"]) ?>" name="cidade" id="cidade">

                    <input type="hidden" name="transportadoraID" value="<?php echo $infoTransportadora["transportadoraID"] ?>">

                    <input type="submit" value="Confirmar Exclusão">
                </form>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>