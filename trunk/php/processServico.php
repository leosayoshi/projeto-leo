<?php

include 'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;
$rua = isset($_POST['rua']) && $_POST['rua'] ? trim($_POST['rua']) : null;
$bairro = isset($_POST['bairro']) && $_POST['bairro'] ? trim($_POST['bairro']) : null;
$servico = isset($_POST['servico']) && $_POST['servico'] ? trim($_POST['servico']) : null;
$especializacao = isset($_POST['especializacao']) && $_POST['especializacao'] ? trim($_POST['especializacao']) : null;

if ($nome && $email && $senha && $rua && $bairro && $tipo && $especializacao) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    $senha = md5($_POST['senha']);
    $sql = (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) 
            ? "UPDATE cadastro SET nome='$nome', email='$email', senha='$senha', rua=$rua, bairro=$bairro, servico=$servico, especializacao=$especializacao WHERE idcadastro = $idcadastro" 
            : "INSERT INTO cadastro (nome, email, senha, rua, bairro, tipo, servico) VALUES ('$nome', '$email', '$senha', '$rua', '$bairro', '$servico', '$especializacao')";

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