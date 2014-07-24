<?php
include 'connection.php';

$nome = $_POST['nome'];
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;


if ($nome && $senha) {
  
        
        $result = mysql_query($sql, $dataBase);{

        if (mysql_num_rows($result) == 0) {
            if (strlen($senha) >= 6) {
                $senha = md5($_POST['senha']);
            } else {
                 header('Location: ../index.php?pagina=formeditapaciente&message=5');
            exit;
            }
            $tipo = 1;
        $sql = (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) ? "UPDATE cadastro SET nome='$nome', senha='$senha', tipo='$tipo' WHERE idcadastro = $idcadastro" : "INSERT INTO cadastro (nome, senha, tipo) VALUES ('$nome', '$senha', '$tipo')";

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