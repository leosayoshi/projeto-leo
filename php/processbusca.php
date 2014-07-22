<?php

include 'connection.php';

    if(isset($_POST['acao']) && $_POST['acao'] == 'enviar') {
        $servico = $_POST['servico'];
        $bairro = $_POST['bairro'];
        
         //$sql = mysql_query("SELECT * cadastro WHERE servico = '$servico' AND bairro = '$bairro'");
        
         $sql = 'SELECT c.*, b.nome as nomeBairro, s.nome as nomeServico
	FROM cadastro c
	JOIN bairro b ON c.idbairro = b.idbairro
	JOIN servico s ON c.idservico = s.idservico
	ORDER BY nome';
        
        $result = mysql_query($sql, $dataBase);
 if ($result && mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        echo '<div style="border: 2px solid blue; color: margin: 3px; padding: 2px; width: 30%;">';
        echo ' Nome: ' . $row['nome'] . '<br/>';
        echo ' Servico: ' . $row['nomeServico'] . '<br/>';
        echo ' Endereco ' . $row['endereco'] . '<br/>';
        echo ' Bairro ' . $row['nomeBairro'] . '<br/>';
        echo '</div>' . '<br/>';
    } header ('Location: ../index.php?pagina=busca&message=1');
                exit;
} else {
    header ('Location: ../index.php?pagina=busca&message=2');;
}       
    }
 
 ?>  