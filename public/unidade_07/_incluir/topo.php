<header>
    <div id="header_central">

        <?php
            if(isset($_SESSION["user_portal"])){
                $user = $_SESSION["user_portal"];

                $pesquisaNome = "select nomeCompleto
                                 from clientes
                                where clienteID = {$user}";

                $nomeBC = mysqli_query($conecta, $pesquisaNome);

                if(!$nomeBC){
                    die("Falha no banco");
                }

                $nomeBC = mysqli_fetch_assoc($nomeBC);
                $nome = $nomeBC["nomeCompleto"];
        ?>
            <div id="header_saudacao"><h5>Bem vindo, <?php echo $nome ?> - <a href="sair.php">Sair</a></h5></div>
        <?php
            }
        ?>
        <img src="assets/logo_andes.gif">
        <img src="assets/text_bnwcoffee.gif">
    </div>
</header>