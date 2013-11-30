<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>validarUsuario</title>
<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
<script type="text/javascript">
</script>
</head>
<body>
<form action="" method="post">
<?php
	//echo md5($_POST['pass']);
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	$sql_query ="select * from usuario where email = '" .$_POST['eMail']."' and pass ='".md5($_POST['pass'])."'";
	
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	if($filas==1)
	{
		while($resultado = mysql_fetch_array($query))
		{
			$_SESSION['cod_usuario'] = $resultado['code'];
			$_SESSION['alias'] = $resultado['alias'];
			$_SESSION['cod_tipoUsuario'] = $resultado['cod_tipoUsuario'];
			
			$sql_query ="update usuario set log = 1 where code =".$_SESSION['cod_usuario'];
			$query = mysql_query($sql_query,$conn);
			
			if($_SESSION['cod_tipoUsuario'] == 1)
				header("location:Reportes.php?");
			else
				header("location:listadoPlayList2.php?privacidad=2");
		}
	}
	else
	{	
		$_SESSION['finish'] = true;
		header("location:login.php");
	}
         
	mysql_close($conn);

?>

</form>
</body>
</html>