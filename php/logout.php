<?php
session_start();
session_destroy();
setcookie("manterLogado", "", time() - 7200, '/trunk/');
setcookie('email', '', time() - 7200, '/trunk/');
header('Location: ../index.php');
exit;
?>