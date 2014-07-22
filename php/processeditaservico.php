<?php
include 'connection.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$endereco = $_POST['endereco'];
$idbairro = $_POST['idbairro'];
$idservico = $_POST['idservico'];
$cadastroespecializacao = $_POST['$cadastroespecializacao'];


if ($nome || $senha || $endereco || $idbairro ||$idservico ||$cadastroespecializacao) {
  
        
        $result = mysql_query($sql, $dataBase);

        if (mysql_num_rows($result) == 0) {
            if (strlen($senha) >= 0 || 6) {
                $senha = md5($_POST['senha']);
            } else {
                 header('Location: ../index.php?pagina=formeditaservico&message=5');
            exit;
            }
            $tipo = 2;
        $sql = (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) ? "UPDATE cadastro SET nome='$nome', senha='$senha', tipo='$tipo' idbairro='$idbairro', endereco='$endereco', idservico='$idservico' WHERE idcadastro = $idcadastro" : "INSERT INTO cadastro (nome, senha, tipo, bairro, endereco, idservico) VALUES ('$nome', '$senha', '$tipo','$bairro','$endereco', '$idservico')";

        $result = mysql_query($sql, $dataBase);
        if ($result) {
                $idcadastro = mysql_insert_id();
                foreach ($cadastroespecializacao as $idespecializacao) {
                    $sql = "INSERT INTO cadastroespecializacao (idcadastro, idespecializacao) 
					VALUES ($idcadastro, $idespecializacao)";
                    $result = mysql_query($sql, $dataBase);
                }

        if ($result) {
            header('Location: ../index.php?pagina=home&message=3');
            exit;
        } else {
            header('Location: ../index.php?pagina=formeditaservico&message=2');
            exit;
        }
        } else {
             header('Location: ../index.php?pagina=formeditaservico&message=4');
                exit;
        }
    }
} else {
    header('Location: ../index.php?pagina=formeditaservico&message=1');
    exit;
}
?>