<?php

include 'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;

if ($nome && $email && $senha) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM cadastro WHERE email = '$email'";
        $result = mysql_query($sql, $dataBase);

        if (mysql_num_rows($result) == 0) {
            if (strlen($senha) >= 6) {
                $senha = md5($_POST['senha']);
            } 
            $tipo = 1;
        $sql = (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) ? "UPDATE cadastro SET nome='$nome', email='$email', senha='$senha', tipo='$tipo' WHERE idcadastro = $idcadastro" : "INSERT INTO cadastro (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";

        $result = mysql_query($sql, $dataBase);

        if ($result) {
            header('Location: ../index.php?pagina=form&message=3');
            exit;
        } else {
            header('Location: ../index.php?pagina=form&message=2');
            exit;
        }
        } else {
             header('Location: ../index.php?pagina=form&message=4');
                exit;
        }
    }
} else {
    header('Location: ../index.php?pagina=form&message=1');
    exit;
}
?>