<?php

include 'connection.php';

if (isset($_GET['idpessoa']) && ($idpessoa = $_GET['idpessoa'])) {

    $sql = "SELECT * FROM pessoa WHERE idpessoa = $idpessoa";
    $result = mysql_query($sql, $dataBase);
     
    if (mysql_num_rows($result) == 1) {

        $sql = "DELETE FROM pessoa WHERE idpessoa = $idpessoa";
        $result = mysql_query($sql, $dataBase);

        if ($result) {
            header('Location: index.php?message=1');
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