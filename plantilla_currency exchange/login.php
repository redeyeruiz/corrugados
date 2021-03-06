<?php
session_start();
include_once('php/utilerias.php');
if(isset($_SESSION['mens_error'])){
	echo "<script type='text/javascript'>";
	echo "alert('".$_SESSION['mens_error']."')";
	echo "</script>";
	unset($_SESSION['mens_error']);
}elseif (isset($_SESSION['conectado'])){
	header('Location: '.redirect('inicio'));
	die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Portal Papeles Corrugados</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-20 p-b-20">
				<span class="login100-form-title p-b-50">
					<img src="images/papeles_corrugados.png" alt="Papeles Corrugados" width="300" height="125">
					</span>
				<form class="login100-form validate-form" action="php/autenticacion.php" method="POST">
					<span class="login100-form-title p-b-40">
						Bienvenido
					</span>
					<span class="login100-form-avatar">
						<img src="images/user_logo2.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-30" data-validate = "Ingresa un usuario">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Ingresa una contrase??a">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Contrase??a"></span>
					</div>

					<div class="container-login100-form-btn">
						<!--<button class="login100-form-btn">
							Entrar
						</button>-->
						<input class="login100-form-btn" type="submit" value="Entrar">
					</div>

					<ul class="login-more p-t-60">
						<li class="m-b-8">
							<span class="txt1">
								??Olvidaste tu
							</span>

							<a href="#" class="txt2">
								Usuario / Contrase??a?
							</a>
						</li>

						<li>
							<span class="txt1">
								??No tienes una cuenta? Comun??cate con un 
							</span>

							<a href="#" class="txt2">
								supervisor
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>