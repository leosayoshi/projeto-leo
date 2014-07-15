<div id="home">
<h4>Seja bem vindo!</h4>

<p><?php echo date('d/m/Y') ?></p>

    <?php
    $sql = 'SELECT c.*, b.nome as nomeBairro, s.nome as nomeServico
	FROM cadastro c
	JOIN bairro b ON c.idbairro = b.idbairro
	JOIN servico s ON c.idservico = s.idservico

	WHERE  c.tipo="2" ORDER BY c.idcadastro DESC LIMIT 3';

	$result = mysql_query($sql, $dataBase);

	if ($result && mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        echo '<div style="border: 2px solid blue; color: margin: 3px; padding: 2px; width: 30%;">';
        echo ' Nome: ' . $row['nome'] . '<br/>';
        echo ' Servico: ' . $row['nomeServico'] . '<br/>';
        echo ' Especializacao: ' . '<br/>';
        echo ' Endereco ' . $row['endereco'] . '<br/>';
        echo ' Bairro ' . $row['nomeBairro'] . '<br/>';
        echo '</div>' . '<br/>';
    }
} else {
    echo '<tr><td cols="4">Nao tem pessoas cadastradas.</td></tr>';
}
?>  
</div>