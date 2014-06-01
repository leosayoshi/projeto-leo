<div id="busca">
    <form>
    <fieldset id="busca">Busca
            <fieldset>Especializacao</fieldset>
            <fieldset>Bairro
            <select> <?php
$sql = mysql_query("SELECT nome FROM bairro");
while($nome = mysql_fetch_object($sql)){
echo "<option value='$nome->nome'>
	$nome->nome
	</option>";
}
?></fieldset></select>
            <input type="submit" value="buscar">
    </fieldset>
    </form>
    
</div>