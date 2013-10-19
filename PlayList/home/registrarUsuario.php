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
	var ape = document.getElementById("apellido");
	if(ape.value.length < 3 && ape.value.length < 25)
	{
		msg = msg + "el apellido debe contener entre 3 y 25  caracteres \n";
		document.getElementById("imgApellido").style.display = "block";
	}
	var email = document.getElementById("eMail");
	if (!validarEmail(email.value) && email.value.length < 40)
	{
		msg = msg + "e-mail erroneo \n";
		document.getElementById("imgEmail").style.display = "block";
	}
	var pass = document.getElementById("pass");
	if(pass.value.length < 1 && pass.value.length < 25)
	{
		msg = msg + "la password debe contener entre 1 y 25  caracteres \n";
		document.getElementById("imgPass").style.display = "block";
	}
	var rePass = document.getElementById("rePass");
	if(rePass.value.length < 1 && pass.value == rePass.value)
	{
		msg = msg + "ambas password deben ser iguales \n";
		document.getElementById("imgRePass").style.display = "block";
	}
	var alias = document.getElementById("alias");
	if(alias.value.length < 1 && alias.value.length < 25)
	{
		msg = msg + "el alias debe contener 1 y 25  caracteres  \n";
		document.getElementById("imgAlias").style.display = "block";
	}

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
<div id="divRegistrarse">
	<table>
	<tr>
	<td>Nombre: </td>
	<td><input type="text" name="nombre" id="nombre"/></td>
	<td><img src="../images/cruz.png"/ id="imgNombre" style="display:none;"></td>
	</tr>
	<tr>
	<td>Apellido: </td>
	<td><input type="text" name="apellido" id="apellido"/></td>
	<td><img src="../images/cruz.png"/ id="imgApellido" style="display:none;"></td>
	</tr>
	<tr>
	<td>E-Mail: </td>
	<td><input type="text" name="eMail" id="eMail"/></td>
	<td><img src="../images/cruz.png" id="imgEmail" style="display:none;"/></td>
	</tr>
	<tr>
	<td>PassWord: </td>
	<td><input type="password" name="pass" id="pass"/></td>
	<td><img src="../images/cruz.png" id="imgPass" style="display:none;"/></td>
	</tr>
	<tr>
	<td>Re-PassWord: </td>
	<td><input type="password" name="rePass" id="rePass"/></td>
	<td><img src="../images/cruz.png" id="imgRePass" style="display:none;"/></td>
	</tr>
	<tr>
	<tr>
	<td>Alias: </td>
	<td><input type="text" name="alias" id="alias" /></td>
	<td><img src="../images/cruz.png" id="imgAlias" style="display:none;"/></td>
	</tr>
	<tr>
	<td><input type="submit" value="Aceptar"/></td>
	<td><input type="button" value="Volver" onclick="javascript:returnInicio()"/></td>
	</tr>
	</table>
	<?php
	if(isset($_SESSION['finish']))
		if($_SESSION['finish'] == true)
			{
				echo "Ya existe un usuario con ese mail";
				$_SESSION['finish'] = false;
			}
?>
</div>
</form>
</body>
</html>