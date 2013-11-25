<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query =	"delete from seguimientousuario where cod_usuario = ".$_SESSION['cod_usuario']." and cod_usuarioAseguir = ".$_REQUEST['codUsuarioAEliminar'];
	$query = mysql_query($sql_query,$conn);

	$sql_query =	"delete from seguimientousuario where cod_usuario = ".$_REQUEST['codUsuarioAEliminar']." and cod_usuarioAseguir = ".$_SESSION['cod_usuario'];
	$query = mysql_query($sql_query,$conn);
	
	header("location:misAmigos.php");
		
	mysql_close($conn); 

?>