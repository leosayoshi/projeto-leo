<div id="home">
    <h4 style="margin-left: 40%;">Seja bem vindo!</h4>

<p style="margin-left: 40%;"><?php echo date('d/m/Y') ?></p>
<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> Todos os campos devem ser preenchidos!.</p></div>';
            echo '<br/>';
            break;
        case 2:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p></div>';
            echo '<br/>';
            break;
        case 3:
            echo '<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding">
		<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
		Cadastro feito com sucesso!</p></div>';
            echo '<br/>';
            break;
         case 4:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> O endereco de email ja esta cadastrado</p></div>';
            echo '<br/>';
             break;
         case 5:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> A senha deve conter no minimo 6 caracteres</p></div>';
            echo '<br/>';
             break;
    }
}
?>


    <?php
    $sql = 'SELECT c.*, b.nome as nomeBairro, s.nome as nomeServico
	FROM cadastro c
	JOIN bairro b ON c.idbairro = b.idbairro
	JOIN servico s ON c.idservico = s.idservico

	WHERE  c.tipo="2" ORDER BY c.idcadastro DESC LIMIT 5';

	$result = mysql_query($sql, $dataBase);

	if ($result && mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        echo '<div style="border: 2px solid black; margin-left:30%; background: rgba(255,255,255,.9); color: margin: 3px; padding: 2px; width: 30%;">';
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