<?php
    function enviarMensagem($dados){
        //Dadps do usuario
        $nomeUsuario = $dados["nome"];
        $emailUsuario = $dados["email"];
        $mensagemUsuario = $dados["mensagem"];

        //Variaveis de envio
        $destino = "hrosa994@gmail.com";
        $remetente = "hrosa994@gmail.com";
        $assunto = "Mensagem do site";

        //Corpo do email
        $mensagem = "O usuario " . $nomeUsuario . " enviou um mensagem."."</br>";
        $mensagem .= "Email do usuario: "."</br>";
        $mensagem .= "Mensagem: </br>";
        $mensagem .= $mensagemUsuario;

        //Configuração adicional
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$nomeUsuario.' <'.$remetente.'>';

        return mail($destino, $assunto, $mensagem, $headers);
    }
?>