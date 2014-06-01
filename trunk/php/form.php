<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<p>Todos os campos devem ser preenchidos!</p>';
            break;
        case 2:
            echo '<p>Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p>';
            break;
        case 3:
            echo '<p>salvo.</p>';
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

                    <fieldset><legend>Endereco</legend>
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" id="rua" />	
                        <label for="bairro">Bairro</label>
                        <select>
                            <?php
$sql = mysql_query("SELECT nome FROM bairro");
while($nome = mysql_fetch_object($sql)){
echo "<option value='$nome->nome'>
	$nome->nome
	</option>";
}
?>
                        </select>
                    </fieldset>

                    <fieldset><legend>Servico</legend>
                        <label for="servico">Servico</label> 
                        Hospital<input type="radio" name="servico" value="hospital">
                        Clinica<input type="radio" name="servico" value="clinica">
                        <br/>
                        
                        <br/><label for="especializacao">especializacao</label> 
                            Clinico geral<input type="checkbox" name="especializacao" value="">
                            Ambulatorio<input type="checkbox" name="especializacao" value="">
                            Cardiologia<input type="checkbox" name="especializacao" value="">
                            Emergencia<input type="checkbox" name="especializacao" value="">
                            Odontologia<input type="checkbox" name="especializacao" value="">
                            Pediatria<input type="checkbox" name="especializacao" value="">
                          
                        <input type="submit" value="Salvar" />
                    </fieldset>
        </form>
            </div>
    </div> 

</fieldset>
</form>
</div>