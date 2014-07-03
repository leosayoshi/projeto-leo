<div id="home">
<h4>Seja bem vindo!</h4>

<p><?php echo date('d/m/Y') ?></p>
<div id="propServ">
    <table cellspacing="0" border="0">
	<tr class="title">
		<th>Nome do Servico</th>
		<th>Tipo do servico</th>
		<th>Endereco</th>
		<th>Bairro</th>
	</tr>
    <?php
    $sql = 'SELECT * FROM cadastro WHERE idcadastro=1';
	$result = mysql_query($sql, $dataBase);

	if ($result && mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row['nome'] . '</td>';
			echo '<td>' . $row['idservico'] . '</td>';
			echo '<td>' . $row['endereco'] . '</td>';
			echo '<td>' . $row['idbairro'] . '</td>';
			echo '</tr>';
		}
	} else
		echo '<tr><td cols="4">Nao tem pessoas cadastradas.</td></tr>';
	?>
    </table>
</div>
</div>