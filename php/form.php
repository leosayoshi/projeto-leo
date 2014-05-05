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
    
    <fieldset id="situacao"><legend>Eu sou:</legend>
 <label><input type="radio" name="rd-servico" value="Feminino" />Paciente</label>
        <label><input type="radio" name="rd-servico" value="Masculino" />Servico</label>
        </fieldset>
    
    
    <div id="tipoForm">
        
                <div id="Feminino"> <fieldset> <legend>Novo Cadastro</legend>        
        <fieldset><legend>Dados Cadastrais</legend>
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" />
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" />          
    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" maxlength="11" />
        </fieldset></div>
        
                <div id="Masculino"><fieldset> <legend>Novo Cadastro</legend>        
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
    <label for="Bairro">Bairro</label>
    <input type="text" name="Bairro" id="Bairro" />	
    </fieldset>
    
    <fieldset><legend>Servico</legend>
         <label for="tipo">Tipo</label> 
         <select>
             <option>Hospital</option>
             <option>Clinica</option>
             <option>Posto de saude</option>
             <option>Laboratorio</option>
         </select>
         <label for="servico">Servico</label> 
         <select>
             <option>Clinico geral</option>
             <option>Ambulatorio</option>
             <option>Cardiologia</option>
             <option>Emergencia</option>
             <option>Odontologia</option>
             <option>Pediatria</option>
         </select>
    </fieldset></div>
        </div>
    
    
    
    
    
    
            <input type="submit" value="Salvar" />
    </fieldset>
</form>
</div>