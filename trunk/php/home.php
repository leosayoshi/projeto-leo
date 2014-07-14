<div id="home">
<h4>Seja bem vindo!</h4>

<p><?php echo date('d/m/Y') ?></p>

    <?php
    $sql = 'SELECT * FROM cadastro WHERE idcadastro ORDER BY idcadastro DESC LIMIT 3';
	$result = mysql_query($sql, $dataBase);

	if ($result && mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			echo '<div style="border: 2px solid blue; color: margin: 3px; padding: 2px; width: 30%;">'. ' Servico: '.$row['nome'] .' servico ' . $row['idservico'] .'<br/>'.' Especilzacao'.$row['especializacao'].'<br/>'.' Endereco '.' '. $row['endereco'] . '<br/>'.' Bairro '. $row['idbairro'] .'</div>'.'<br/>';

		}
	} else
		echo '<tr><td cols="4">Nao tem pessoas cadastradas.</td></tr>';
	?>  
</div>