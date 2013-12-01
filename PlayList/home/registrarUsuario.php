<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Registrar Usuario</title>
		<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
		<script type="text/javascript">
		function returnInicio()
		{
			location.href="login.php";
		}
		function validarRegistro()
		{
			var msg ="";
			var nom = document.getElementById("nombre");
			if(nom.value.length < 3 && nom.value.length < 25)
			{
					msg = msg + "el nombre debe contener entre 3 y 25  caracteres \n";
					document.getElementById("imgNombre").style.display = "block";
			}
			else
				document.getElementById("imgNombre").style.display = "none";
			
			var ape = document.getElementById("apellido");
			if(ape.value.length < 3 && ape.value.length < 25)
			{
				msg = msg + "el apellido debe contener entre 3 y 25  caracteres \n";
				document.getElementById("imgApellido").style.display = "block";
			}
			else
				document.getElementById("imgApellido").style.display = "none";
				
			var email = document.getElementById("eMail");
			if (!validarEmail(email.value) && email.value.length < 40)
			{
				msg = msg + "e-mail erroneo \n";
				document.getElementById("imgEmail").style.display = "block";
			}
			else
				document.getElementById("imgEmail").style.display = "none";
				
			var pass = document.getElementById("pass");
			if(pass.value.length < 1 && pass.value.length < 25)
			{
				msg = msg + "la password debe contener entre 1 y 25  caracteres \n";
				document.getElementById("imgPass").style.display = "block";
			}
			else
				document.getElementById("imgPass").style.display = "none";
				
			var rePass = document.getElementById("rePass");
			if(rePass.value.length < 1 && pass.value == rePass.value)
			{
				msg = msg + "ambas password deben ser iguales \n";
				document.getElementById("imgRePass").style.display = "block";
			}
			else
				document.getElementById("imgRePass").style.display = "none";
			var alias = document.getElementById("alias");
			if(alias.value.length < 1 && alias.value.length < 25)
			{
				msg = msg + "el alias debe contener 1 y 25  caracteres  \n";
				document.getElementById("imgAlias").style.display = "block";
			}
			else
				document.getElementById("imgRePass").style.display = "none";

			if(msg.length > 0)
			{
				alert(msg);
				return false;
			}
			return true;
		}
		function validarEmail(email) 
		{
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))
				return true;
			else 
				return false;

		}
		</script>
	</head>
	<body>
		<form action="insertarUsuario.php" method="post" onsubmit="javascript:return validarRegistro()">
		<?php			
			session_start();
		?>
		<div  class="registro">
			<img src="../images/logo.jpg" class="imgRegistro"/>
			<fieldset>	
				<legend>Registrar Usuario</legend>
				<div class="contenido">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" id="nombre" class="input"/>
					<img src="../images/cruz.png"/ id="imgNombre" style="display:none;" class="img"/>
				</div>
				<div class="contenido">
					<label for="apellido">Apellido:</label>
					<input type="text" name="apellido" id="apellido" class="input"/>
					<img src="../images/cruz.png"/ id="imgApellido" style="display:none;"class="img"/>
				</div>	
				<div class="contenido">
					<label for="e-mail">E-Mail:</label>
					<input type="text" name="eMail" id="eMail" class="input"/>
					<img src="../images/cruz.png" id="imgEmail" style="display:none;" class="img"/>
				</div>	
				<div class="contenido">
					<label for="pass">PassWord:</label> 
					<input type="password" name="pass" id="pass" class="input"/>
					<img src="../images/cruz.png" id="imgPass" style="display:none;" class="img"/>
				</div>	
				<div class="contenido">
					<label for="repass">Re-PassWord:</label> 
					<input type="password" name="rePass" id="rePass" class="input"/>
					<img src="../images/cruz.png" id="imgRePass" style="display:none;" class="img"/>
				</div>
				<div class="contenido">
					<label for="alias">Alias:</label> 
					<input type="text" name="alias" id="alias" class="input"/>
					<img src="../images/cruz.png" id="imgAlias" style="display:none;" class="img"/>
				</div>
				<div class="submit">
					<input type="submit" value="Aceptar" class="boton"/>
					<input type="button" value="Volver" class="boton" onclick="javascript:returnInicio()"/>
				</div>
			</fieldset>
		<?php
		if(isset($_SESSION['finish']))
			if($_SESSION['finish'] == true)
				{
					echo "<p>Ya existe un usuario con ese mail</p>";
					$_SESSION['finish'] = false;
				}
		?>
		</div>
		</form>
	</body>
</html>