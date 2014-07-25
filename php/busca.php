  
<div id="busca">
    <?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo  '<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding">
		<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
		RESULTADOS DA BUSCA:</p></div>';
            break;
        case 2:
            echo '<div id="busca"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> OS CRITERIOS DE BUSCA NAO TIVERAM RESULTADOS!</p></div>';
            break;

    }
}
?>  
    <form id="busca" name="busca" method="post" action="">
    <fieldset id="busca">Busca
        <fieldset>
                        <label for="servico">Servico</label> <select name="servico">
                       <?php $sql = mysql_query("SELECT * FROM servico");
while($servico = mysql_fetch_object($sql)){
echo "<option value='$servico->idservico'/>
	$servico->nome
        </option>";
}
?></select>
                        <br/>
                        </fieldset>
                         
                        <fieldset>
          <legend>Bairro</legend>
            <select name="bairro"> <?php
$sql = mysql_query("SELECT nome FROM bairro");
while($nome = mysql_fetch_object($sql)){
echo "<option value='$nome->nome'>
	$nome->nome
	</option>";
}
?></select> 
          <input type="hidden" name="acao" value="enviar">
            <input type="submit" value="buscar">
    </fieldset>
    </fieldset>
    </form>
    
 <?php
    if(isset($_POST['acao']) && $_POST['acao'] == 'enviar') {
        $servico = $_POST['servico'];
        $bairro = $_POST['bairro'];
        
         //$sql = mysql_query("SELECT * cadastro WHERE servico = '$servico' AND bairro = '$bairro'");
        
         $sql = 'SELECT c.nome, c.endereco, e.nome, b.nome, s.nome
FROM `buscamedica`.`cadastro` as c, 
`buscamedica`.`cadastroespecializacao` as ce, 
`buscamedica`.`bairro` as b,
`buscamedica`.`servico` as s,
`buscamedica`.`especializacao` as e
WHERE c.idcadastro=ce.idcadastro
AND ce.idespecializacao=e.idespecializacao
AND c.idbairro=b.idbairro
AND c.idservico=s.idservico
AND b.bairro LIKE $bairro';
        
        $result = mysql_query($sql, $dataBase);
 if ($result && mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        echo '<br/>';
        echo '<div style="border: 2px solid black; margin-left:30%; background: rgba(255,255,255,.9); color: margin: 3px; padding: 2px; width: 30%;">';
        echo ' Nome: ' . $row['nome'] . '<br/>';
        echo ' Servico: ' . $row['nomeServico'] . '<br/>';
        echo ' Especializacao: ' . $row['nomeEspecializacao'] . '<br/>';
        echo ' Endereco ' . $row['endereco'] . '<br/>';
        echo ' Bairro ' . $row['nomeBairro'] . '<br/>';
        echo '</div>' . '<br/>';
    }
} else {
    echo '<tr><td cols="4">Nao tem pessoas cadastradas.</td></tr>';
}       
    }
 
 ?>  
   
</div>