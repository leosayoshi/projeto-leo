<h1>Lista de pessoas</h1>

<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            $message = 'Pessoa deletada com sucesso!';
            break;
        case 2:
            $message = 'Ocorreu um problema ao salvar os dados. Por favor, tente novamente.';
            break;
        case 3:
            $message = 'A pessoa nao pode ser deletada. Tente novamente!';
            break;
        case 4:
            $message = 'Pessoa salva com sucesso!';
            break;
    }
    echo '<p class="message">' . $message . '</p>';
}
?>

<table cellspacing="1" border="1">
    <tr class="title">
        <th>Nome</th>
        <th>Sexo</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Descricao</th>
		<th>Cadastro</th>
        <th>Status</th>
	    <th>Editar</th>
    </tr>
    <?php
    $sql = 'SELECT * FROM pessoa';
    $result = mysql_query($sql, $dataBase);

    if ($result && mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['sexo'] . '</td>';
            echo '<td>' . $row['cpf'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['descricao'] . '</td>';
			echo '<td>' . $row['cadastro'] . '</td>';
            echo '<td>' . $row['ativo'] . '</td>';
            echo '<td>'
            . '<a href="index.php?pagina=form&idpessoa=' . $row['idpessoa'] . '">editar</a>'
            . '  <a href="php/delete.php?idpessoa=' . $row['idpessoa'] . '">apagar</a>'
            . '</td>';
            echo '</tr>';
        }
    } else
        echo '<tr><td cols="4">Nao há pessoas cadastradas.</td></tr>';
    ?>
</table>