<?php

$uploadfile = "xml/".md5(basename($_FILES['arquivo']['name']).time()).".xml";

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e Registrado!\n";
    echo "<a href='lista.php'>Arquivos.</a>";
} else {
    echo "Erro ao enviar arquivo!\n";
}