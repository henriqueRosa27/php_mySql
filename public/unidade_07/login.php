<?php require_once("../../conexao/conexao.php"); ?>
<?php
    if(isset($_POST["usuario"]) || isset($_POST["senha"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $infoLogin = "Select * ";
        $infoLogin .= "from clientes ";
        $infoLogin .= "where usuario = '{$usuario}' ";
        $infoLogin .= "and senha = '{$senha}'";

        //echo $infoLogin;
        $acesso = mysqli_query($conecta, $infoLogin);
        //var_dump($acesso);
        if(!$acesso){
            die("Falha na consulta ao banco!");
        }

        $informacao = mysqli_fetch_assoc($acesso);

        if( empty($informacao)){
            $mensagem = "Login sem sucesso.";
        }
        else{
            header("location:listagem.php");
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div id="header_central">
                <img src="assets/logo_andes.gif">
                <img src="assets/text_bnwcoffee.gif">
            </div>
        </header>
        
        <main>  
            <div id="janela_login">
                <form action="login.php" method="post">
                    <h2>Tela de Login</h2>
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="Login">

                    <?php
                        if(isset($mensagem)){
                    ?>
                        <p><?php echo $mensagem ?></p>
                    <?php
                        }
                    ?>
                </form>
            </div>
        </main>

        <footer>
            <div id="footer_central">
                <p>ANDES &eacute; uma empresa fict&iacute;cia, usada para o curso PHP Integra&ccedil;&atilde;o com MySQL.</p>
            </div>
        </footer>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>