<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;

	$sql_query = "delete from notificaciones where cod_playlist = ".$_REQUEST['codPlaylist'];
	$query = mysql_query($sql_query,$conn);
	$sql_query = "delete from rankingplaylist where cod_playlist = ".$_REQUEST['codPlaylist'];
	$query = mysql_query($sql_query,$conn);
	$sql_query = "delete from playlist where code = ".$_REQUEST['codPlaylist']." and cod_usuario = ".$_SESSION['cod_usuario'];
	$query = mysql_query($sql_query,$conn);

	header("location:listadoPlayList2.php?privacidad=".$_REQUEST['privacidad']);
		
	mysql_close($conn); 

?>