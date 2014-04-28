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
<form id="cadastro" action="php/process.php" class="cadastro" method="post">
    <fieldset> <legend>Novo Cadastro</legend>
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" />

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" />

    <label for="celular">Senha</label>
    <input type="password" name="senha" id="senha" maxlength="11" />
    </fieldset>
    <input type="submit" value="Salvar" />
</form>
</div>