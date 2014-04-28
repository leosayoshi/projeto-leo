<?php

include 'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;

if ($nome && $email && $senha) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $senha = md5($_POST['senha']);
    $sql = (isset($_GET['idusuario']) && ($idusuario = $_GET['idusuario'])) 
            ? "UPDATE usuario SET nome='$nome', email='$email', senha='$senha' WHERE idusuario = $idusuario" 
            : "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    $result = mysql_query($sql, $dataBase);

    if ($result) {
        header('Location: ../index.php?pagina=cadastro&message=3');
        exit; 
    } else {
        header('Location: ../index.php?pagina=cadastro&message=2');
        exit;
    }
} else {
    header('Location: ../index.php?pagina=cadastro&message=1');
    exit;
}
}
?>