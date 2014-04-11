<?php

include 'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$sexo = isset($_POST['sexo']) && $_POST['sexo'] ? trim($_POST['sexo']) : null;
$cpf = isset($_POST['cpf']) && $_POST['cpf'] ? trim($_POST['cpf']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$descricao = ($_POST['descricao']);
$ativo = ($_POST['ativo']);

if ($nome && $sexo && $cpf && $email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $valido = validaCPF($cpf);
        if ($valido) {
            $sql = (isset($_GET['idpessoa']) && ($idpessoa = $_GET['idpessoa'])) ? "UPDATE pessoa SET nome='$nome', sexo='$sexo', cpf='$cpf', email='$email', descricao='$descricao', ativo='$ativo' WHERE idpessoa = $idpessoa" : "INSERT INTO pessoa (nome, sexo, cpf, email, descricao, ativo) VALUES ('$nome', '$sexo', '$cpf', '$email', '$descricao', '$ativo')";

            $result = mysql_query($sql, $dataBase);

            if ($result) {
                header('Location: ../index.php?message=4');
                exit;
            } else {
                header('Location: ../index.php?pagina=form&message=2');
                exit;
            }
        } else {
            header('Location: ../index.php?pagina=form&message=3');
            exit;
        }
    }else{
         header('Location: ../index.php?pagina=form&message=4');
         exit;
    }
} else {
    header('Location: ../index.php?pagina=form&message=1');
    exit;
}
?>