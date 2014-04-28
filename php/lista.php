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
			$message = 'Salvo com sucesso!';
			break;
	}
	echo '<p class="message">' . $message . '</p>';
}
?>

<br/>

<table cellspacing="0" border="0">
	<tr class="title">
		<th>Nome</th>
		<th>E-mail</th>
		<th>Celular</th>
		<th>Acoes</th>
	</tr>
	<?php
	$sql = 'SELECT * FROM pessoa';
	$result = mysql_query($sql, $dataBase);

	if ($result && mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row['nome'] . '</td>';
			echo '<td>' . $row['email'] . '</td>';
			echo '<td>' . $row['celular'] . '</td>';
			echo '<td>'
			. '<a href="index.php?pagina=form&idpessoa=' . $row['idpessoa'] . '">editar</a>'
			. '  <a href="php/delete.php?idpessoa=' . $row['idpessoa'] . '">apagar</a>'
			. '</td>';
			echo '</tr>';
		}
	} else
		echo '<tr><td cols="4">Nao tem pessoas cadastradas.</td></tr>';
	?>
</table>