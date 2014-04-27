<?php

include 'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$celular = isset($_POST['celular']) && $_POST['celular'] ? trim($_POST['celular']) : null;

if ($nome && $email && $celular) {
    $sql = (isset($_GET['idpessoa']) && ($idpessoa = $_GET['idpessoa'])) 
            ? "UPDATE pessoa SET nome='$nome', email='$email', celular='$celular' WHERE idpessoa = $idpessoa" 
            : "INSERT INTO pessoa (nome, email, celular) VALUES ('$nome', '$email', '$celular')";

    $result = mysql_query($sql, $dataBase);

    if ($result) {
        header('Location: ../index.php?pagina=form&message=3');
        exit; 
    } else {
        header('Location: ../index.php?pagina=form&message=2');
        exit;
    }
} else {
    header('Location: ../index.php?pagina=form&message=1');
    exit;
}

?>