<?php

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<div id="cadastro01"><p>Todos os campos devem ser preenchidos!</p></div>';
            break;
        case 2:
            echo '<div id="cadastro01"><p>Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p></div>';
            break;
        case 3:
            echo '<div id="cadastro01"><p>salvo.</p></div>';
            break;
    }
}

?>


<div id="cadastro01">
    <form id="cadastro" class="cadastro" action="php/processCadastro.php" method="post">
        <!--
        <fieldset id="cad01">
            <legend>Cadastro</legend>
        <fieldset id="situacao"><legend>Situacao</legend>
  <input type="radio" name="situacao" value="p">Paciente
  <input type="radio" name="situacao" value="s">Servico
        </fieldset
        -->
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" size="30" placeholder="Digite seu nome" />
    
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" size="30" placeholder="Digite seu E-mail" />

    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" size="30" placeholder="Minimo de 6 caracteres" />
    
        </fieldset>
    <input type="submit" value="Salvar" />
</form>
</div>