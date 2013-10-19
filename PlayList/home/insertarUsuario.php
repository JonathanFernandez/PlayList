<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insertar Usuario</title>
<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
<script type="text/javascript">
</script>
</head>
<body>
<form action="validarUsuario.php" method="post">
<?php
	session_start();
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	$sql_query ="select * from usuario where email = '" .$_POST['eMail']."'";
	$query = mysql_query($sql_query,$conn);
	$filas = mysql_num_rows($query);
	if($filas>=1)
	{
		$_SESSION['finish'] = true;
		mysql_close($conn);
		header("location:registrarUsuariio.php");
		
	}
	else
	{	
		$sql_query = "insert into usuario(nombre, apellido,email, pass, alias, cod_tipoUsuario,fua)
					  values('".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['eMail']."','".md5($_POST['pass'])."','".$_POST['alias']."',2,now())";
		$query = mysql_query($sql_query,$conn);
		mysql_close($conn);
		header("location:headerMenu.php");
		
	}
         
	
?>

</form>
</body>
</html>