<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
<script type="text/javascript">
function registrarse()
{
 location.href="registrarUsuario.php";
}
</script>
</head>
<body>
<form action="validarUsuario.php" method="post">
<?php
	/*if(isset($_SESSION['nombre']) && isset($_SESSION['pass']))
	{	
		unset($_SESSION['nombre']);// session_destroy();
		unset($_SESSION['pass']);
	}*/
	session_start();
?>
<div id="divLog">
	<table>
	<tr>
	<td>E-Mail: </td>
	<td><input type="text" name="eMail" id="eMail"/></td>
	</tr>
	<tr>
	<td>PassWord: </td>
	<td><input type="password" name="pass" id="pass"/></td>
	</tr>
	<tr>
	<td><input type="submit" value="Aceptar"/></td>
	<td><input type="button" value="Registrarse" onclick="javascript:registrarse();"/></td>
	</tr>
	</table>
</div>
<?php
	if(isset($_SESSION['finish']))
		if($_SESSION['finish'] == true)
			{
				echo "error de logueo";
				$_SESSION['finish'] = false;
			}
?>
</form>
</body>
</html>