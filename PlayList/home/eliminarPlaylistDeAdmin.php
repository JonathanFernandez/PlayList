<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;

	$sql_query = "delete from notificaciones where cod_playlist = ".$_REQUEST['codPlaylistAEliminar'];
	$query = mysql_query($sql_query,$conn);
	$sql_query = "delete from rankingplaylist where cod_playlist = ".$_REQUEST['codPlaylistAEliminar'];
	$query = mysql_query($sql_query,$conn);
	$sql_query = "delete from musicaplaylist where cod_playlist = ".$_REQUEST['codPlaylistAEliminar'];
	$query = mysql_query($sql_query,$conn);
	$sql_query = "delete from playlist where code = ".$_REQUEST['codPlaylistAEliminar'];
	$query = mysql_query($sql_query,$conn);

	header("location:eliminarPlayListAdim.php");
		
	mysql_close($conn); 

?>