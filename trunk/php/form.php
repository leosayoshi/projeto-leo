<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> Todos os campos devem ser preenchidos!.</p></div>';
            break;
        case 2:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p></div>';
            break;
        case 3:
            echo '<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding">
		<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
		Cadastro feito com sucesso!</p></div>';
            break;
    }
}
?>      

<div id="cadastro01">


    <fieldset class="cadastro">
        <legend>Eu sou:</legend>
        <label><input type="radio" name="rd-servico" value="Paciente" />Paciente</label>
        <label><input type="radio" name="rd-servico" value="Servico" />Servico</label>
    </fieldset>


    <div id="tipoForm">
        <div id="Paciente">
        <form id="cadastro" action="php/process.php" class="cadastro" method="post">
             <fieldset> <legend>Novo Cadastro</legend>        
                    <fieldset>
                        <legend>Dados Cadastrais</legend>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" />
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" />          
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" maxlength="11" />
                        <input type="submit" value="Salvar" />
                    </fieldset>
            
        </form>
            </div>
        <div id="Servico">
        <form id="cadastro" action="php/processServico.php" class="cadastro" method="post">

            
                <fieldset> <legend>Novo Cadastro</legend>        
                    <fieldset><legend>Dados Cadastrais</legend>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" />
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" />          
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" maxlength="11" />
                    </fieldset>

                    <fieldset><legend>Localizacao</legend>
                        <label for="endereco">Endereco</label>
                        <input type="text" name="endereco" id="endereco" />	
                        <label for="bairro">Bairro</label>
                        <select>
                            <?php
$sql = mysql_query("SELECT * FROM bairro");
while($bairro = mysql_fetch_object($sql)){
echo "<option value='$bairro->idbairro'>
	$bairro->nome
	</option>";
}
?>
                        </select>
                    </fieldset>

                    <fieldset><legend>Servico</legend>
                        <label for="servico">Servico</label> 
                       <?php $sql = mysql_query("SELECT * FROM servico");
while($servico = mysql_fetch_object($sql)){
echo "<input type='radio' name='$servico->nome'  value='$servico->idservico'/>
	$servico->nome";
}
?>
                        <br/>
                        
                        <br/><label for="especializacao">especializacao</label> 
                            <?php $sql = mysql_query("SELECT * FROM especializacao");
while($especializacao = mysql_fetch_object($sql)){
echo "<input type='checkbox' name='$especializacao->nome'  value='$especializacao->idespecializacao'/>
	$especializacao->nome";
}
?>
                          
                        <input type="submit" value="Salvar" />
                    </fieldset>
        </form>
            </div>
    </div> 

</fieldset>
</form>
</div>