<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>InsertarPlayList</title>
<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
<script src="../jQuery/1.10.3jquery-ui.js"></script>

</head>
<body>
<form action="validarUsuario.php" method="post">
<?php
	session_start();
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	$sql_query ="select * from playlist where nombre = '" .$_POST['nomPlaylist']."'";
	$query = mysql_query($sql_query,$conn);
	$filas = mysql_num_rows($query);
	if($filas>=1)
	{
		$_SESSION['finish'] = true;
		mysql_close($conn);
		header("location:crearPlaylist.php");
		
	}
	else
	{	
		$sql_query = "insert into playlist(nombre,categoria,cod_privacidad,cod_usuario,fechaCreacion,fechaModificacion)
					  values('".$_POST['nomPlaylist']."','".$_POST['categoria']."',".$_POST['privacidad'].",".$_SESSION['cod_usuario'] .","."now(),"."now())";
		
		$query = mysql_query($sql_query,$conn);
		mysql_close($conn);
		header("location:crearPlaylist.php");
		
	}
         
	
?>

</form>
</body>
</html>