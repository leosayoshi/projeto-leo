<?php

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<p>Todos os campos devem ser preenchidos!</p>';
            break;
        case 2:
            echo '<p>Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p>';
            break;
        case 3:
            echo '<p>salvo.</p>';
            break;
    }
}

if (isset($_GET['idusuario']) && ($idusuario = $_GET['idusuario'])) {
    $sql = "SELECT * FROM usuario WHERE idpessoa = $idusuario";
    $result = mysql_query($sql, $dataBase);
    
    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $nome = $row['nome'];
        $email = $row['email'];
    }
}

?>

<?php if(isset($idusuario)): ?>
<h1>Edicao da pessoa <?php echo $nome ?></h1>
<?php else: ?>
<h1>Nova pessoa</h1>
<?php endif; ?>

<form action="php/process.php<?php echo isset($idusuario) ? '?idusuario=' . $idusuario : '' ?>" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : '' ?>" />

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" value="<?php echo isset($email) ? $email : '' ?>" />

    <label for="celular">Senha</label>
    <input type="password" name="senha" id="senha" maxlength="11" />

    <input type="submit" value="Salvar" />
	<a href="index.php" title="Cancelar">Cancelar</a>
</form>