  
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
            echo 'echo <div id="busca"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> OS CRITERIOS DE BUSCA NAO TIVERAM RESULTADOS!</p></div>';
            break;

    }
}
?>  
    <form id="busca" method="post" action="php/processbusca.php">
    <fieldset id="busca">Busca
        <fieldset>
                        <label for="servico">Servico</label> 
                       <?php $sql = mysql_query("SELECT * FROM servico");
while($servico = mysql_fetch_object($sql)){
echo "<input type='radio' name='idservico' value='$servico->idservico'/>
	$servico->nome";
}
?>
                        <br/>
                        </fieldset>
                            <fieldset><legend> Especializacao</legend>
           <?php $sql = mysql_query("SELECT * FROM especializacao");
while($especializacao = mysql_fetch_object($sql)){
echo "<input type='checkbox' name='cadastroespecializacao[]'  value='$especializacao->idespecializacao'/>
	$especializacao->nome";
}
?>
        <br/>
                        </fieldset>
                        <fieldset>
          <legend>Bairro</legend>
            <select> <?php
$sql = mysql_query("SELECT nome FROM bairro");
while($nome = mysql_fetch_object($sql)){
echo "<option value='$nome->nome'>
	$nome->nome
	</option>";
}
?></select>
            <input type="submit" value="buscar">
    </fieldset>
    </fieldset>
    </form>
    
</div>