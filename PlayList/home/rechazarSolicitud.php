<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
					
	$sql_query =	"delete from seguimientousuario where cod_usuario = ".$_REQUEST['cod_usuarioQueMeSigue']." and cod_usuarioAseguir = ".$_SESSION['cod_usuario'];
	$query = mysql_query($sql_query,$conn);

	$sql_query =	"delete from seguimientousuario where cod_usuario = ".$_SESSION['cod_usuario']." and cod_usuarioAseguir = ".$_REQUEST['cod_usuarioQueMeSigue'];
	$query = mysql_query($sql_query,$conn);
		
	header("location:solicitudesDeAmistad.php");
		
	mysql_close($conn); 

?>