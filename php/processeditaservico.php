<?php
include 'connection.php';

$nome = $_POST['nome'];
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;
$endereco = $_POST['endereco'];



if ($nome || $endereco && $senha ) {
  
        
        $result = mysql_query($sql, $dataBase);{

        if (mysql_num_rows($result) == 0) {
            if (strlen($senha) >= 6) {
                $senha = md5($_POST['senha']);
            } else {
                 header('Location: ../index.php?pagina=formeditaservico&message=5');
            exit;
            }
            $tipo = 2;
        $sql = (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) ? "UPDATE cadastro SET nome='$nome', senha='$senha', tipo='$tipo', endereco='$endereco' WHERE idcadastro = $idcadastro" : "INSERT INTO cadastro (nome, senha, tipo, endereco) VALUES ('$nome', '$senha', '$tipo','$endereco')";

        $result = mysql_query($sql, $dataBase);

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