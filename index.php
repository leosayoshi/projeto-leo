<?php
session_start();
include 'php/connection.php';
include 'php/function.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Busca Medica Rio</title>
        <link rel="stylesheet" type="text/css" href="css/trontastic/jquery-ui-1.10.4.custom.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <script type="text/javascript">
$(document).ready(function(){
        $("#tipoForm > div").hide();
        $("#sel-servico").change(function(){
                $("#tipoForm > div").hide();
                $( '#'+$( this ).val() ).show('fast');
        });
        $("input[name='rd-servico']").click(function(){
                $("#tipoForm > div").hide();
                $( '#'+$( this ).val() ).show('fast');  
        });
});
</script>
 
<script>
function validaSenha (input){ 
	if (input.value != document.getElementById('senha').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>
<script>
function validaSenha2 (input){ 
	if (input.value != document.getElementById('senha').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>
    </head>
    <body>
	<nav id="menu">
		<ul>
			<li>
				<a href="index.php">Home</a>
			</li>

			<?php if (taLogado() && $_SESSION['tipo']==3): ?>
			<li>
				<a href="index.php?pagina=lista" title="Pessoas cadastradas">Pessoas cadastradas</a>
			</li>
			
			<?php endif; ?>
			
                        <?php if (taLogado() && $_SESSION['tipo']==1): ?>
			<li>
				<a href="index.php?pagina=busca" title="busca">Busca</a>
			</li>
			
			<?php endif; ?>
                        
			<?php if (taLogado()): ?>
			<li>
				<a href="#" title="Opcoes do usuario" class="submenu"><?php echo $_SESSION['email'] ?></a>
				<ul>
					<li>
						<a href="index.php?pagina=edita" title="Editar">Editar</a>
					</li>
					<li>
						<a href="php/logout.php" title="Logar no site">Sair</a>
					</li>
				</ul>
			</li>
			<?php else: ?>
			<li>
				<a href="#" title="Logar no site" id="formLogin">Login</a>
				<form action="php/login.php" method="post">
					<label for="email">E-mail</label>
					<input type="text" name="email" />

					<label for="senha">Senha</label>
					<input type="password" name="senha" />
					
					<div id="manterLogado">
						<input type="checkbox" name="manterLogado" id="manterLogado" value="1" />
						<label for="manterLogado">Manter logado</label>
					</div>

					<input type="submit" value="Login" />
				</form>
			</li>
                        <li>
				<a href="index.php?pagina=form">Cadastre-se</a>
			</li>
			<?php endif; ?>
		</ul>
        </nav>
        <div id="interface">
    <?php 
	
	if (isset($_GET['pagina'])) {
		if (file_exists('php/' . $_GET['pagina'] . '.php')) {
			switch ($_GET['pagina']) {
				case 'lista':
					if (taLogado())
						include 'php/' . $_GET['pagina'] . '.php';
					else 
						include 'php/naopermitida.php'; 
				break;
				case 'busca':
					if (taLogado() && $_SESSION['tipo']==1)
						include 'php/' . $_GET['pagina'] . '.php';
					else 
						include 'php/naopermitida.php'; 
				break;
				default:
					include 'php/' . $_GET['pagina'] . '.php';
				break;
			}
		} else
			include 'php/naoencontrada.php'; 
	} else
		include 'php/home.php'; 
	?>    
            </div>
    </body>
</html>