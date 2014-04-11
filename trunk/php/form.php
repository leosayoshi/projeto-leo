<?php

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<p>Todos os campos devem ser preenchidos!</p>';
            break;
        case 2:
            echo '<p>Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p>';
            break;
        CASE 3:
            echo '<p>O n�mero do CPF � inv�lido </p>';
            break;
        CASE 4:
            echo '<p>O E-mail � inv�lido </p>';
            break;
    }
}

if (isset($_GET['idpessoa']) && ($idpessoa = $_GET['idpessoa'])) {
    $sql = "SELECT * FROM pessoa WHERE idpessoa = $idpessoa";
    $result = mysql_query($sql, $dataBase);
    
    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $nome = $row['nome'];
        $sexo = $row['sexo'];
        $cpf = $row['cpf'];
        $email = $row['email'];
        $descricao = $row['descricao'];
        $ativo = $row['ativo'];
    }
}

?>

<?php if(isset($idpessoa)): ?>
<h1>Edicao da pessoa <?php echo $nome ?></h1>
<?php else: ?>
<h1>Cadastro</h1>
<?php endif; ?>

<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>

<form action="php/process.php<?php echo isset($idpessoa) ? '?idpessoa=' . $idpessoa : '' ?>" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="<?php echo isset($nome) ? $nome : '' ?>" />
    
    <label for="sexo">Sexo</label>
                <select name="sexo">
                    <option>Selecione</option>
                    <option value="m">Masculino</option>
                     <option value="f">Feminino</option>
                </select>

            <br/>

             <label for="cpf">CPF</label>
            <input type="text" name="cpf" maxlength="14"OnKeyPress="formatar('###.###.###-##', this)" placeholder="Digite seu CPF" />
                     <br/>
                     
    <label for="email">E-mail</label>
    <input type="text" name="email" placeholder="Digite seu E-mail" value="<?php echo isset($email) ? $email : '' ?>" />

   <label for="descricao">Descrição</label>
            <textarea name="descricao" rows="4" cols="50">
            
            </textarea>
            <br/>

            <fieldset id="ativo"><legend>Status</legend>
            <input type="radio" name="ativo" value="1"checked /><label for="ati">Ativo</label>
            <input type="radio" name="ativo" value="0" /><label for="ina">Inativo</label>
            </fieldset>

            <br/>
    <input type="submit" value="Salvar" />
</form>