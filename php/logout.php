<?php
session_start();
session_destroy();
setcookie("manterLogado", "", time() - 7200, '/crud/');
setcookie('email', $row['email'], time() -7200,'/crud/' );
header('Location: ../index.php');
exit;
?>