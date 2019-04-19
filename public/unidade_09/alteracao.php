<?php require_once("../../conexao/conexao.php"); ?>

<?php
    if(isset($_POST["nometransportadora"])/* && isset($_POST["endereco"]) && isset($_POST["telefone"]) && isset($_POST["cidade"]) && isset($_POST["estados"])
        && isset($_POST["cep"]) && isset($_POST["cnpj"])*/){
        $nome = utf8_decode($_POST["nometransportadora"]);
        $endereco = utf8_decode($_POST["endereco"]);
        $telefone = $_POST["telefone"];
        $cidade = utf8_decode($_POST["cidade"]);
        $estado = $_POST["estados"];
        $cep = $_POST["cep"];
        $cnpj = $_POST["cnpj"];
        $idTransportadora = $_POST["idTransportadora"];

        //Alterando no Banco de Dados
        $queryTransportadora = "Update transportadoras 
                                Set nometransportadora = '{$nome}',
                                    endereco = '{$endereco}', 
                                    telefone = '{$telefone}', 
                                    cidade = '{$cidade}', 
                                    estadoID = {$estado}, 
                                    cep = '{$cep}', 
                                    cnpj = '{$cnpj}'
                                where transportadoraID = {$idTransportadora} ";
        
        $opAlterarTransportadora = mysqli_query($conecta, $queryTransportadora);

        if(!$opAlterarTransportadora){
            die("Erro na alteração " + var_dump($queryTransportadora));
        }
        else{
            header("location:listagem.php");
        }
    }
?>

<?php
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
                <form action="alteracao.php" method="post">
                    <h2>Alteração de Transportadoras</h2>

                    <label for="nometransportadora">Nome</label>
                    <input type="text" value="<?php echo utf8_encode($infoTransportadora["nometransportadora"]) ?>" name="nometransportadora" id="nometransportadora">

                    <label for="endereco">Endereco</label>
                    <input type="text" value="<?php echo utf8_encode($infoTransportadora["endereco"]) ?>" name="endereco" id="endereco">

                    <label for="telefone">Telefone</label>
                    <input type="text" value="<?php echo $infoTransportadora["telefone"] ?>" name="telefone" id="telefone">

                    <label for="cidade">Cidade</label>
                    <input type="text" value="<?php echo utf8_encode($infoTransportadora["cidade"]) ?>" name="cidade" id="cidade">

                    <label for="estados">Estado</label>
                    <select id="estados" name="estados">
                        <?php
                            $estadoID = $infoTransportadora["estadoID"];
                            while($dado = mysqli_fetch_assoc($buscaEstados)){
                                if($dado["estadoID"] == $estadoID){
                        ?>
                            <option value="<?php echo $dado["estadoID"] ?>" selected>
                                <?php echo utf8_encode($dado["nome"]) ?>
                            </option>
                        <?php
                            }
                            else{
                        ?>
                            <option value="<?php echo $dado["estadoID"] ?>">
                                <?php echo utf8_encode($dado["nome"]) ?>
                            </option>

                        <?php
                                }
                            }
                        ?>
                    </select>

                    <label for="cep">CEP</label>
                    <input type="text" value="<?php echo $infoTransportadora["cep"] ?>" name="cep" id="cep">

                    <label for="cnpj">CNPJ</label>
                    <input type="text" value="<?php echo $infoTransportadora["cnpj"] ?>" name="cnpj" id="cnpj">

                    <input type="hidden" name="idTransportadora" value="<?php echo $infoTransportadora["transportadoraID"] ?>">

                    <input type="submit" value="Alterar">
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