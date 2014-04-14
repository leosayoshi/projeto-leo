<div id="conteudo">
<h4>Seja bem vindo!</h4>
<p class="data"><?php echo date('d/m/Y') ?></p>
<form id="busca" action="" method="post">
    <h3>Procure o seu servico medico:</h3>
	<label for="servico">Servico:
            <select name="nservico" id="servico">
            <option>Publico</option>
            <option>Particular</option>
        </select>
        </label>
	<label for="cidade">Cidade:
        <select name="ncidade" id="cidade">
            <option value="capital" selected>Capital-RJ</option>
            <option value="outras">Outras Cidades -RJ</option>
        </select>
        
	<label for="bairro">Bairro: <input type="text" name="mbairro" id="bairro" placeholder="digite o nome do bairro" list="bairros"/>
            <datalist id="bairros">
                <option value="Centro"></option>
                <option value="Tijuca"></option>
                <option value="Marechal Hermes"></option>
            </datalist>
        
        <input class="enviabusca" type="submit" value="Buscar" />
        </form>
</div>