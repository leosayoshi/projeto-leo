<?php

include 'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;
$endereco = isset($_POST['endereco']) && $_POST['endereco'] ? trim($_POST['endereco']) : null;
$idbairro = isset($_POST['idbairro']) && $_POST['idbairro'] ? trim($_POST['idbairro']) : null
$idservico = isset($_POST['idservico']) && $_POST['idservico'] ? trim($_POST['idservico']) : null
$cadasespecializacao = isset($_POST['idespecializacao']) && $_POST['idespecializacao'] ? trim($_POST['idespecializacao']) : null


if ($nome && $email && $senha && $endereco && $idbairro && $idservico && $cadastroespecializacao) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL))   
    $senha = md5($_POST['senha']);
    $tipo = 2;
    $sql = (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) 
            ? "UPDATE cadastro SET nome='$nome', endereco='$endereco', email='$email', senha='$senha' tipo='$tipo', idbairro='$idbairro', idservico='$idservico' WHERE idcadastro = $idcadastro" 
            : "INSERT INTO cadastro (nome, endereco, email, senha, tipo, idbairro, idservico) VALUES ('$nome', '$endereco', '$email', '$senha', '$tipo', '$idbairro', '$idservico')";

    $result = mysql_query($sql, $dataBase);

    if ($result) {
		$idcadastro = mysql_insert_id();
		foreach ($_POST['cadastroespecializacao'] as $idespecializacao) {
			$sql = "INSERTT INTO cadastroespecializacao (idcadastro, idespecializacao) 
					VALUES ($idcadastro, $idespecializacao)";
			$result = mysql_query($sql, $dataBase);
		}
		
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