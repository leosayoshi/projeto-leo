<div id="busca">
    <form id="busca">
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