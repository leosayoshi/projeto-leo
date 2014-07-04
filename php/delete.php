<?php

include 'connection.php';

if (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) {

    $sql = "SELECT * FROM cadastro WHERE idcadastro = $idcadastro";
    $result = mysql_query($sql, $dataBase);
     
    if (mysql_num_rows($result) == 1) {

        $sql = "DELETE FROM cadastro WHERE idcadastro = $idcadastro";
        $result = mysql_query($sql, $dataBase);

        if ($result) {
            header('Location: ../index.php?message=1');
            exit;
        }
    }
    
    header('Location: ../index.php?message=3');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}
?> 