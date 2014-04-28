<?php

$dataBase = mysql_connect('localhost', 'root', 'kyosetsu');
$base = mysql_select_db('buscamedrio');

if (!$dataBase && !$base) 
    die('<p>Ocorreu um problema ao tentar conectar com o banco de dados .</p>');

?>