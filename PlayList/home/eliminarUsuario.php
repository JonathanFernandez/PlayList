<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	
	$sql_query =	"delete from rankingplaylist where cod_usuario = ".$_REQUEST['codUsuarioAEliminar'];
	$query = mysql_query($sql_query,$conn);
	
	$sql_query =	"delete from seguimientousuario where cod_usuario = ".$_REQUEST['codUsuarioAEliminar']." or cod_usuarioaseguir = ".$_REQUEST['codUsuarioAEliminar'];
	$query = mysql_query($sql_query,$conn);
	
	$sql_query =	"delete from musicaplaylist where cod_playlist in (select code from playlist pl where pl.cod_usuario = ".$_REQUEST['codUsuarioAEliminar'].")";
	$query = mysql_query($sql_query,$conn);
	
	$sql_query =	"delete from playlist where cod_usuario = ".$_REQUEST['codUsuarioAEliminar'];
	$query = mysql_query($sql_query,$conn);

	$sql_query =	"delete from notificaciones where cod_usuario = ".$_REQUEST['codUsuarioAEliminar'];
	$query = mysql_query($sql_query,$conn);

	$sql_query =	"delete from usuario where code = ".$_REQUEST['codUsuarioAEliminar'];
	$query = mysql_query($sql_query,$conn);

	header("location:eliminarUsuarioAdmin.php");

	mysql_close($conn); 

?>