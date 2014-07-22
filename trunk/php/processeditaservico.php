<?php
include 'connection.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$endereco = $_POST['endereco'];
$idbairro = $_POST['idbairro'];

if ($nome || $senha || $endereco || $idbairro) {
  
        
        $result = mysql_query($sql, $dataBase);{

        if (mysql_num_rows($result) == 0) {
            if (strlen($senha) >= 0 || 6) {
                $senha = md5($_POST['senha']);
            } else {
                 header('Location: ../index.php?pagina=formeditapaciente&message=5');
            exit;
            }
            $tipo = 1;
        $sql = (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) ? "UPDATE cadastro SET nome='$nome', senha='$senha', tipo='$tipo' bairro='$idbairro', endereco='$endereco' WHERE idcadastro = $idcadastro" : "INSERT INTO cadastro (nome, senha, tipo, bairro, endereco) VALUES ('$nome', '$senha', '$tipo','$idbairro','$endereco')";

        $result = mysql_query($sql, $dataBase);

        if ($result) {
            header('Location: ../index.php?pagina=home&message=3');
            exit;
        } else {
            header('Location: ../index.php?pagina=formeditapaciente&message=2');
            exit;
        }
        } else {
             header('Location: ../index.php?pagina=formeditapaciente&message=4');
                exit;
        }
    }
} else {
    header('Location: ../index.php?pagina=formeditapaciente&message=1');
    exit;
}
?>