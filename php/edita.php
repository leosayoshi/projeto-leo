<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            $message = 'Pessoa deletada com sucesso!';
            break;
        case 2:
            $message = 'Ocorreu um problema ao salvar os dados. Por favor, tente novamente.';
            break;
        case 3:
            $message = 'A pessoa nao pode ser deletada. Tente novamente!';
            break;
        case 4:
            $message = 'Pessoa salva com sucesso!';
            break;
    }
    echo '<p class="message">' . $message . '</p>';
}
?>

<table cellspacing="1" border="1">
    <tr class="title">
        <th>Nome</th>
        <th>Email</th>
	 <th>Tipo</th>
	 <th>Ações</th>
    </tr>
    <?php
    $sql = 'SELECT * FROM cadastro WHERE idcadastro="'.$_SESSION['idcadastro'].'"AND"'.$_SESSION['tipo'].'"';
    $result = mysql_query($sql, $dataBase);

    if ($result && mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['tipo'] . '</td>';
            if ($_SESSION['tipo']==1){
            echo '<td>'
            . '<a href="index.php?pagina=formeditapaciente&idcadastro=' . $row['idcadastro'] . '">edição</a>'
            . '  <a href="php/delete.php?idcadastro=' . $row['idcadastro'] . '">deletar cadastro</a>'
            . '</td>';
            echo '</tr>';
            } if ($_SESSION['tipo']==2){
            echo '<td>'
            . '<a href="index.php?pagina=formeditaservico&idcadastro=' . $row['idcadastro'] . '">edição</a>'
            . '  <a href="php/delete.php?idcadastro=' . $row['idcadastro'] . '">deletar cadastro</a>'
            . '</td>';
            echo '</tr>';
            }
        }
    } else
        echo '<tr><td cols="4">Nao ha dados cadastrados.</td></tr>';
    ?>
</table>