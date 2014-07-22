<div id="cadastro01">
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
         case 4:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> O endereco de email ja esta cadastrado</p></div>';
            break;
         case 5:
            echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> A senha deve conter no minimo 6 caracteres</p></div>';
            break;
    }
}
if (isset($_GET['idcadastro']) && ($idcadastro = $_GET['idcadastro'])) {
    $sql = "SELECT * FROM cadastro WHERE idcadastro = $idcadastro";
    $result = mysql_query($sql, $dataBase);
    
    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $nome = $row['nome'];
        $email = $row['email'];
        $senha = $row['senha'];
    }
}
?>      
    
<?php if(isset($idcadastro)): ?>
<h1>Edicao de cadastro<?php echo $nome ?></h1>
<?php else: ?>
<h1>Cadastro</h1>
<?php endif; ?>
        <form id="cadastro" action="php/process.php<?php echo isset($idcadastro) ? '?idcadastro=' . $idcadastro : '' ?>" class="cadastro" method="post" enctype="multipart/form-data">
             <fieldset> <legend>Editar Cadastro</legend>        
                    <fieldset>
                        <legend>Dados Cadastrais</legend>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php echo isset($nome) ? $nome : '' ?>" />
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="Digite seu email" value="<?php echo isset($email) ? $email : '' ?>"/>    
                        <input type="file" name="arquivo" id="txFoto" />
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha" pattern="^.{6}$" type="password" title="A senha deve conter no minimo 6 caracteres" />
                        <label for="repetir_senha">Confirmar Senha</label>
					<input name="repetir_senha" type="password"  placeholder="Repetir Senha" title="Repetir Senha" oninput="validaSenha(this)" />
                        <input type="submit" value="Salvar" />
                    </fieldset>
                    </fieldset>
            
        </form>
           </div>