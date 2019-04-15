<?php
    //Passo 1 - abrir conexão

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";

    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

    //Passo 2 -  Testar Conexão

    if(mysqli_connect_errno()){
        die("Conexão falhou". mysqli_connect_errno());
    }

    setlocale (LC_ALL, 'pt_BR');
    $fmt = new NumberFormatter( 'pt_BR', NumberFormatter::CURRENCY );
?>