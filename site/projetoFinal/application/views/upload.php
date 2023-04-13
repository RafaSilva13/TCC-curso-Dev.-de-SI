<?php

    if($_FILES['foto']['name'] != "" || $_FILES['foto']['name'] != null ) {

        $tipos_permitidos = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        $extensao = mime_content_type($tipo);
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

        // array de tipos da extensao do arquivo
        if (in_array($extensao, $tipos_permitidos)) {

            $pasta = "assets/imgperfil/";   // pasta 
            $temporario = $_FILES['foto']['tmp_name']; // nome original do arquivo
            $novo_nome = uniqid().".$ext";             // novo nome do arquivo

            // upload do arquivo
            if(move_uploaded_file($temporario, $pasta.$novo_nome)) {
                $foto = $novo_nome;
            } 

        } else {
            echo "<p>Tipo do arquivo não é permitido.</p>";
            $foto = $_SESSION['foto'];                 // manter a foto anterior
            $_SESSION['msg_upload'] = "Foto em formato $extensao inválido";
        } 
       

    } else {
        $foto = $_SESSION['foto']; // manter a foto anterior
        $_SESSION['msg_upload'] = "Foto não foi modificada";

    } 
?>    
